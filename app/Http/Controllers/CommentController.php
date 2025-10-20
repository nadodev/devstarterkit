<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Lesson;
use App\Models\Course;

class CommentController extends Controller
{
    public function store(Request $request, Course $course, Lesson $lesson)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        
        // Verificar se o usuário está inscrito no curso
        $enrollment = $user->enrollments()->where('course_id', $course->id)->first();
        
        if (!$enrollment) {
            return response()->json(['error' => 'Você precisa se inscrever neste curso primeiro.'], 403);
        }

        // Verificar se a aula pertence ao curso
        if ($lesson->module->course_id !== $course->id) {
            return response()->json(['error' => 'Aula não encontrada'], 404);
        }

        $request->validate([
            'content' => 'required|string|max:1000',
            'parent_id' => 'nullable|exists:comments,id'
        ]);

        $comment = Comment::create([
            'user_id' => $user->id,
            'lesson_id' => $lesson->id,
            'parent_id' => $request->parent_id,
            'content' => $request->content,
            'is_approved' => true, // Por enquanto, todos os comentários são aprovados automaticamente
        ]);

        // Carregar relacionamentos para retornar
        $comment->load(['user', 'replies.user']);

        return response()->json([
            'success' => true,
            'comment' => $comment,
            'message' => 'Comentário adicionado com sucesso!'
        ]);
    }

    public function index(Course $course, Lesson $lesson)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        
        // Verificar se o usuário está inscrito no curso
        $enrollment = $user->enrollments()->where('course_id', $course->id)->first();
        
        if (!$enrollment) {
            return response()->json(['error' => 'Você precisa se inscrever neste curso primeiro.'], 403);
        }

        // Verificar se a aula pertence ao curso
        if ($lesson->module->course_id !== $course->id) {
            return response()->json(['error' => 'Aula não encontrada'], 404);
        }

        $comments = $lesson->comments()
            ->mainComments()
            ->with(['user', 'replies.user'])
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'comments' => $comments
        ]);
    }

    public function destroy(Course $course, Lesson $lesson, Comment $comment)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        
        // Verificar se o usuário está inscrito no curso
        $enrollment = $user->enrollments()->where('course_id', $course->id)->first();
        
        if (!$enrollment) {
            return response()->json(['error' => 'Você precisa se inscrever neste curso primeiro.'], 403);
        }

        // Verificar se a aula pertence ao curso
        if ($lesson->module->course_id !== $course->id) {
            return response()->json(['error' => 'Aula não encontrada'], 404);
        }

        // Verificar se o comentário pertence à aula
        if ($comment->lesson_id !== $lesson->id) {
            return response()->json(['error' => 'Comentário não encontrado'], 404);
        }

        // Verificar se o usuário pode deletar (próprio comentário ou é instrutor/admin)
        if ($comment->user_id !== $user->id && !$user->isInstructor() && !$user->isAdmin()) {
            return response()->json(['error' => 'Você não tem permissão para deletar este comentário'], 403);
        }

        $comment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Comentário removido com sucesso!'
        ]);
    }
}