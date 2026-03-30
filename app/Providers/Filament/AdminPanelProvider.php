<?php

namespace App\Providers\Filament;

use App\Filament\Resources\ContactMessageResource;
use App\Filament\Resources\ExperienceResource;
use App\Filament\Resources\ToolResource;
use App\Filament\Widgets\AnalyticsOverviewWidget;
use App\Filament\Widgets\PageViewsChartWidget;
use App\Filament\Widgets\ToolClicksChartWidget;
use Filament\Http\Middleware\Authenticate;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors(['primary' => Color::hex('#22c55e')]) // match portfolio green
            ->brandName('Bala Portfolio')
            ->favicon(asset('favicon.ico'))

            ->resources([
                ToolResource::class,
                ExperienceResource::class,
                ContactMessageResource::class,
            ])

            ->widgets([
                AnalyticsOverviewWidget::class,
                PageViewsChartWidget::class,
                ToolClicksChartWidget::class,
            ])

            ->pages([
                Pages\Dashboard::class,
            ])

            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
