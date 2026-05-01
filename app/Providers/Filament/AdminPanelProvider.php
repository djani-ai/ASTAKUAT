<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
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
use TomatoPHP\FilamentUsers\FilamentUsersPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->font('Poppins')
            ->login()
            ->registration()
            ->passwordReset()
            ->emailVerification()
            ->emailChangeVerification()
            ->profile()
            ->colors([
                'danger' => Color::Rose,      // Tetap Rose agar indikasi error jelas
                'gray' => Color::Slate,       // Slate memberikan kesan modern pada tema hijau
                'info' => Color::Cyan,        // Cyan serasi dengan spektrum hijau
                'primary' => Color::Emerald,   // Warna utama menjadi Hijau Emerald
                'success' => Color::Green,    // Warna sukses menggunakan Hijau standar
                'warning' => Color::Amber,    // Amber (orange kekuningan) kontras dengan hijau
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
            ])
            ->navigationGroups([
                NavigationGroup::make()
                    ->label('Master Data')
                    ->icon('heroicon-o-document-text')
                    ->collapsed(true),
                NavigationGroup::make()
                    ->label('Kaderisasi')
                    ->icon('heroicon-o-document-text')
                    ->collapsed(true),
                NavigationGroup::make()
                    ->label('Administrasi')
                    ->icon('heroicon-o-document-text')
                    ->collapsed(true),
                NavigationGroup::make()
                    ->label('Informasi')
                    ->icon('heroicon-o-document-text')
                    ->collapsed(true),
                NavigationGroup::make()
                    ->label('Pengaturan')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Filament Shield')
                    ->collapsed(),
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
            ->plugins([
                FilamentShieldPlugin::make()
                    ->navigationGroup('Pengaturan'),
                FilamentUsersPlugin::make(),
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
