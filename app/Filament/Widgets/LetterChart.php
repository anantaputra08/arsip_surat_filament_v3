<?php

namespace App\Filament\Widgets;

use App\Models\Letter;
use Filament\Widgets\ChartWidget;

class LetterChart extends ChartWidget
{
    protected static ?int $sort = 3;
    protected static ?string $heading = 'Latters ';
    protected static ?string $maxHeight = '300px';


    protected function getData(): array
    {
        $data = collect(range(1, 12))->map(function ($month) {
            return Letter::query()
                ->whereYear('created_at', now()->year)
                ->whereMonth('created_at', $month)
                ->count();
        })->toArray();
        return [
            'datasets' => [
                [
                    'label' => 'Monthly Letters',
                    'data' => $data,
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
