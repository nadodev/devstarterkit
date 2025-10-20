<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'bio',
        'avatar',
        'email_notifications',
        'unsubscribe_token',
        'unsubscribed_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'email_notifications' => 'boolean',
            'unsubscribed_at' => 'datetime',
        ];
    }

    // Relacionamentos
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function progress()
    {
        return $this->hasMany(Progress::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function quizAttempts()
    {
        return $this->hasMany(QuizAttempt::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Métodos de verificação de role
    public function isStudent()
    {
        return $this->role === 'student';
    }

    public function isInstructor()
    {
        return $this->role === 'instructor';
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    // Métodos de controle de email
    public function generateUnsubscribeToken()
    {
        $this->unsubscribe_token = \Str::random(32);
        $this->save();
        return $this->unsubscribe_token;
    }

    public function unsubscribe()
    {
        $this->email_notifications = false;
        $this->unsubscribed_at = now();
        $this->save();
    }

    public function resubscribe()
    {
        $this->email_notifications = true;
        $this->unsubscribed_at = null;
        $this->unsubscribe_token = null;
        $this->save();
    }

    public function canReceiveEmails()
    {
        return $this->email_notifications && !$this->unsubscribed_at;
    }
}
