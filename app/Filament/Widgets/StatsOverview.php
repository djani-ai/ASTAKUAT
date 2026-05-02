<?php

namespace App\Filament\Widgets;

use App\Models\DataAnggota;
use App\Models\DataPr;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected static bool $isLazy = false;
    protected ?string $heading = 'Statistik Aplikasi';
    protected ?string $description = 'Statistik terkini dari aplikasi ASTAKUAT';
    protected function getStats(): array
    {
        $PR = DataPr::count();
        $Anggota = DataAnggota::count();
        $Pengguna = User::count() - 1;
        return [
            Stat::make('Pimpinan Ranting', $PR)
                ->description('Total Pimpinan Ranting')
                ->color('success')
                ->chart([2, 3, 5, 10, 4, 17])
                ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Anggota', $Anggota)
                ->description('Total Anggota Semua Pimpinan Ranting')
                ->color('success')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([2, 3, 5, 10, 4, 17]),
            Stat::make('Pengguna', $Pengguna)
                ->description('Total Pengguna Aplikasi')
                ->color('success')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([2, 3, 5, 10, 4, 17]),
        ];
    }
}
