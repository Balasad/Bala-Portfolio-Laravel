<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnalyticsEvent extends Model
{
    public $timestamps = false;          // only created_at column

    protected $fillable = ['event', 'payload', 'ip_address', 'user_agent', 'referrer'];

    /* ── Static helper to log any event in one line ── */
    public static function log(string $event, ?string $payload = null): void
    {
        static::create([
            'event'      => $event,
            'payload'    => $payload,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'referrer'   => request()->header('referer'),
        ]);
    }

    /* ── Scopes ── */
    public function scopeOfEvent($query, string $event)
    {
        return $query->where('event', $event);
    }

    public function scopeToday($query)
    {
        return $query->whereDate('created_at', today());
    }

    public function scopeThisMonth($query)
    {
        return $query->whereMonth('created_at', now()->month)
                     ->whereYear('created_at', now()->year);
    }
}