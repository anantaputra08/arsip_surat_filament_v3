<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Letter;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Latters', Letter::query()->count())
                ->description('Letters Total')
                // ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('success'),
            Stat::make('Categories', Category::query()->count())
                ->description('Categories Total')
                // ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('info'),
        ];
    }
}
