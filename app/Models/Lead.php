<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'whatsapp',
        'ip_address',
        'user_agent',
        'email_sent',
        'email_sent_at',
    ];

    protected $casts = [
        'email_sent' => 'boolean',
        'email_sent_at' => 'datetime',
    ];

    /**
     * Scope para leads que ainda não receberam email
     */
    public function scopePendingEmail($query)
    {
        return $query->where('email_sent', false);
    }

    /**
     * Scope para leads que já receberam email
     */
    public function scopeEmailSent($query)
    {
        return $query->where('email_sent', true);
    }
}