<?php

namespace App\Filament\Widgets;

use App\Models\AnalyticsEvent;
use App\Models\ContactMessage;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AnalyticsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;
    protected ?string $heading = 'Portfolio Analytics';

    protected function getStats(): array
    {
        /* Page views */
        $viewsToday  = AnalyticsEvent::ofEvent('page_view')->today()->count();
        $viewsMonth  = AnalyticsEvent::ofEvent('page_view')->thisMonth()->count();
        $viewsTotal  = AnalyticsEvent::ofEvent('page_view')->count();

        /* Last 7 days chart data for page views */
        $viewsChart = collect(range(6, 0))->map(
            fn ($d) => AnalyticsEvent::ofEvent('page_view')
                ->whereDate('created_at', now()->subDays($d))
                ->count()
        )->toArray();

        /* CV downloads */
        $cvTotal = AnalyticsEvent::ofEvent('cv_download')->count();
        $cvMonth = AnalyticsEvent::ofEvent('cv_download')->thisMonth()->count();

        $cvChart = collect(range(6, 0))->map(
            fn ($d) => AnalyticsEvent::ofEvent('cv_download')
                ->whereDate('created_at', now()->subDays($d))
                ->count()
        )->toArray();

        /* Most clicked tool */
        $topTool = AnalyticsEvent::ofEvent('tool_click')
            ->selectRaw('payload, COUNT(*) as cnt')
            ->groupBy('payload')
            ->orderByDesc('cnt')
            ->value('payload') ?? '—';

        /* Unread messages */
        $unread = ContactMessage::unread()->count();

        return [
            Stat::make('Page Views (Today)', $viewsToday)
                ->description("{$viewsMonth} this month · {$viewsTotal} total")
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart($viewsChart)
                ->color('success'),

            Stat::make('CV Downloads', $cvTotal)
                ->description("{$cvMonth} this month")
                ->descriptionIcon('heroicon-m-arrow-down-tray')
                ->chart($cvChart)
                ->color('info'),

            Stat::make('Most Clicked Tool', $topTool)
                ->description('In the arc carousel')
                ->descriptionIcon('heroicon-m-cursor-arrow-rays')
                ->color('warning'),

            Stat::make('Unread Messages', $unread)
                ->description($unread > 0 ? 'Needs attention' : 'All caught up!')
                ->descriptionIcon($unread > 0 ? 'heroicon-m-envelope' : 'heroicon-m-check-circle')
                ->color($unread > 0 ? 'danger' : 'success'),
        ];
    }
}