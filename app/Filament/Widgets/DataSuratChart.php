<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class DataSuratChart extends ChartWidget
{
    protected static ?int $sort = 3;
    protected static bool $isLazy = false;
    protected int | string | array $columnSpan = 'half';
    protected ?string $pollingInterval = null;
    protected ?string $heading = 'Data Surat';
    protected string $color = 'danger';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Data Surat Per Ranting',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                    'backgroundColor' => array_map(fn() => sprintf('#%06X', mt_rand(0, 0xFFFFFF)), range(1, 12)),
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
