<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'type',
        'content',
        'video_url',
        'file_path',
        'duration_minutes',
        'order',
        'is_published',
        'is_free',
        'module_id',
        'has_video',
        'has_text',
        'has_file',
        'content_type',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'is_free' => 'boolean',
        'has_video' => 'boolean',
        'has_text' => 'boolean',
        'has_file' => 'boolean',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function course()
    {
        return $this->belongsToThrough(Course::class, Module::class);
    }

    public function progress()
    {
        return $this->hasMany(Progress::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
