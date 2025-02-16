<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $stats = Order::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupByRaw('DATE(created_at)')
            ->orderByRaw('DATE(created_at)')
            ->pluck('count')
            ->toArray();


        return [
            Stat::make('Orders', Order::count())
                ->label('Total Orders')
                ->color('success'),
            Stat::make('Orders', Order::where('status', 'completed')->count())
                ->label('Completed Orders')
                ->color('success'),
            Stat::make('Orders', null)
                ->label('Orders by Date')
                ->chart($stats)
                ->color('success'),
        ];
    }
}
