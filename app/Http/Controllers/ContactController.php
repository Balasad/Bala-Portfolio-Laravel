<?php

namespace App\Http\Controllers;

use App\Models\AnalyticsEvent;
use App\Models\ContactMessage;
use App\Notifications\NewContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\RateLimiter;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        /* ── Rate limit: max 3 submissions per IP per hour ── */
        $key = 'contact:' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 3)) {
            return response()->json([
                'message' => 'Too many requests. Please try again later.',
            ], 429);
        }
        RateLimiter::hit($key, 3600);

        /* ── Validate ── */
        $data = $request->validate([
            'name'    => ['required', 'string', 'max:100'],
            'email'   => ['required', 'email', 'max:150'],
            'subject' => ['nullable', 'string', 'max:200'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
        ]);

        /* ── Save to DB ── */
        $msg = ContactMessage::create([
            ...$data,
            'ip_address' => $request->ip(),
        ]);

        /* ── Log analytics event ── */
        AnalyticsEvent::log('contact_sent');

        /* ── Send email notification to yourself ── */
        // Uncomment and set MAIL_TO in .env when ready:
        // Notification::route('mail', config('portfolio.contact_email'))
        //     ->notify(new NewContactMessage($msg));

        return response()->json(['message' => 'Message sent successfully!']);
    }
}