<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class DataAnggotaChart extends ChartWidget
{
    protected static ?int $sort = 2;
    protected static bool $isLazy = false;
    protected ?string $heading = 'Data Anggota';
    protected int | string | array $columnSpan = 'half';
    protected ?string $pollingInterval = null;
    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Data Anggota Per Ranting',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
