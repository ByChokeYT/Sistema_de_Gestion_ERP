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
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
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
            ->brandName('ERP BOLIVIA')
            ->maxContentWidth('full')
            ->spa()
            ->sidebarCollapsibleOnDesktop(false)
            ->login()
            ->renderHook(
                'panels::head.done',
                fn (): string => '<link rel="stylesheet" href="/css/custom-theme.css">',
            )
            ->colors([
                'primary' => [
                    50 => '#fdf6f4',
                    100 => '#fbe9e3',
                    200 => '#f8d3c7',
                    300 => '#f2b29f',
                    400 => '#e8876c',
                    500 => '#cc785c', // Claude Coral
                    600 => '#b65c44',
                    700 => '#984a38',
                    800 => '#7f3f31',
                    900 => '#6a382d',
                    950 => '#391a14',
                ],
                'danger' => Color::Red,
                'success' => Color::Emerald,
                'warning' => Color::Orange,
                'info' => Color::Teal,
                'gray' => Color::Slate,
            ])
            ->font('Inter')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                // Custom widgets are discovered automatically
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
