<?php

namespace App\Filament\Widgets;

use App\Models\AnalyticsEvent;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class PageViewsChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Page Views — Last 14 Days';
    protected static ?int $sort = 3;
    protected static string $color = 'info';

    protected function getData(): array
    {
        $days   = collect(range(13, 0))->map(fn ($d) => now()->subDays($d));
        $labels = $days->map(fn ($d) => $d->format('M j'))->toArray();

        $views = $days->map(
            fn ($d) => AnalyticsEvent::ofEvent('page_view')
                ->whereDate('created_at', $d)
                ->count()
        )->toArray();

        $downloads = $days->map(
            fn ($d) => AnalyticsEvent::ofEvent('cv_download')
                ->whereDate('created_at', $d)
                ->count()
        )->toArray();

        return [
            'datasets' => [
                [
                    'label'           => 'Page Views',
                    'data'            => $views,
                    'borderColor'     => 'rgba(34, 197, 94, 1)',
                    'backgroundColor' => 'rgba(34, 197, 94, 0.1)',
                    'fill'            => true,
                    'tension'         => 0.4,
                ],
                [
                    'label'           => 'CV Downloads',
                    'data'            => $downloads,
                    'borderColor'     => 'rgba(99, 179, 237, 1)',
                    'backgroundColor' => 'rgba(99, 179, 237, 0.1)',
                    'fill'            => true,
                    'tension'         => 0.4,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}