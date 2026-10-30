<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
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
            ->brandName('TonightOnScreen')
            ->brandLogo(fn () => asset('Tonight OnScreen Logo.png'))
            ->brandLogoHeight('2.5rem')
            ->favicon(fn () => asset('Tonight OnScreen Logo Icon.png'))
            ->colors([
                'primary' => [
                    50 => '#fff8eb',
                    100 => '#feeecc',
                    200 => '#fddb99',
                    300 => '#fbc266',
                    400 => '#faa233',
                    500 => '#FFA500', // Exact Logo Orange/Gold
                    600 => '#e07d00',
                    700 => '#b35900',
                    800 => '#8f4506',
                    900 => '#74390b',
                    950 => '#431c03',
                ],
                'gray' => [
                    50 => '#f7f8fc',
                    100 => '#edf0f8',
                    200 => '#d7dff0',
                    300 => '#b5c3e3',
                    400 => '#8da1d2',
                    500 => '#6d81c1',
                    600 => '#5666ab',
                    700 => '#46528d',
                    800 => '#3c4573',
                    900 => '#13204d',
                    950 => '#010629', // Exact Logo Midnight Navy
                ],
            ])
            ->navigationGroups([
                'Catalog',
                'Talent & Artists',
                'Taxonomies & Meta',
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                \App\Filament\Widgets\EntertainmentStatsWidget::class,
                \App\Filament\Widgets\TitlesChartWidget::class,
                \App\Filament\Widgets\LatestTitlesWidget::class,
                AccountWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
