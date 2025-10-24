<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalyticsEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_type',
        'event_name',
        'event_data',
        'session_id',
        'user_agent',
        'ip_address',
        'page_url',
    ];

    protected $casts = [
        'event_data' => 'array',
    ];

    /**
     * Registrar um evento de analytics
     */
    public static function track($eventType, $eventName, $data = [], $request = null)
    {
        return self::create([
            'event_type' => $eventType,
            'event_name' => $eventName,
            'event_data' => $data,
            'session_id' => session()->getId(),
            'user_agent' => $request ? $request->userAgent() : null,
            'ip_address' => $request ? $request->ip() : null,
            'page_url' => $request ? $request->url() : null,
        ]);
    }

    /**
     * Obter contagem de eventos por tipo
     */
    public static function getEventCounts()
    {
        return self::selectRaw('event_type, COUNT(*) as count')
            ->groupBy('event_type')
            ->pluck('count', 'event_type')
            ->toArray();
    }
}
