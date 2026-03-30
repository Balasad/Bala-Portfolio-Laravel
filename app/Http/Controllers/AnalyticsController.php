<?php

namespace App\Http\Controllers;

use App\Models\AnalyticsEvent;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    /**
     * POST /analytics/event
     * Called from the frontend JS for tool clicks, CV downloads, etc.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'event'   => ['required', 'string', 'in:page_view,cv_download,tool_click,contact_sent'],
            'payload' => ['nullable', 'string', 'max:100'],
        ]);

        AnalyticsEvent::log($data['event'], $data['payload'] ?? null);

        return response()->json(['ok' => true]);
    }
}
