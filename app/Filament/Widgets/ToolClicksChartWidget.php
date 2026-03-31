<?php

namespace App\Filament\Widgets;

use App\Models\AnalyticsEvent;
use Filament\Widgets\ChartWidget;

class ToolClicksChartWidget extends ChartWidget
{
    protected ?string $heading = 'Tool Clicks — Last 30 Days';

    protected function getData(): array
    {
        $rows = AnalyticsEvent::ofEvent('tool_click')
            ->where('created_at', '>=', now()->subDays(30))
            ->selectRaw('payload as tool, COUNT(*) as clicks')
            ->groupBy('payload')
            ->orderByDesc('clicks')
            ->get();

        return [
            'datasets' => [
                [
                    'label'           => 'Clicks',
                    'data'            => $rows->pluck('clicks')->toArray(),
                    'backgroundColor' => [
                        'rgba(34, 197, 94, 0.8)',
                        'rgba(74, 222, 128, 0.8)',
                        'rgba(134, 239, 172, 0.8)',
                        'rgba(187, 247, 208, 0.8)',
                        'rgba(220, 252, 231, 0.8)',
                    ],
                    'borderColor' => 'rgba(34, 197, 94, 1)',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $rows->pluck('tool')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}