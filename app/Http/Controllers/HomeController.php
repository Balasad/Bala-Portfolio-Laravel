<?php

namespace App\Http\Controllers;

use App\Models\AnalyticsEvent;
use App\Models\Experience;
use App\Models\Tool;

class HomeController extends Controller
{
    public function index()
    {
        /* Load tools with their active projects eager-loaded */
        $tools = Tool::active()
            ->with(['projects' => fn ($q) => $q->where('is_active', true)->orderBy('sort_order'),
                    'projects.media',
                    'media',
            ])
            ->get();

        $experiences = Experience::active()->get();

        /* Log page view (fire-and-forget — won't slow the response) */
        defer(fn () => AnalyticsEvent::log('page_view'));

        return view('pages.home', compact('tools', 'experiences'));
    
    }
}