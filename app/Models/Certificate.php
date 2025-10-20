<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'certificate_number',
        'title',
        'description',
        'final_score',
        'total_lessons',
        'completed_lessons',
        'total_quizzes',
        'passed_quizzes',
        'issued_at',
        'expires_at',
        'is_valid',
        'pdf_path',
        'validation_code',
    ];

    protected $casts = [
        'issued_at' => 'datetime',
        'expires_at' => 'datetime',
        'is_valid' => 'boolean',
        'final_score' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
