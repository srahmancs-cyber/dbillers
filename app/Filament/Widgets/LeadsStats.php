<?php

namespace App\Filament\Widgets;

use App\Models\ContactLead;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;

class LeadsStats extends BaseWidget
{
    protected function getStats(): array
    {
        $totalLeads = ContactLead::count();
        $leadsThisMonth = ContactLead::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
        $unreadLeads = ContactLead::where('status', 'unread')->count();

        return [
            Stat::make('Total Leads', $totalLeads)
                ->description('All time submissions')
                ->color('primary'),
            Stat::make('This Month', $leadsThisMonth)
                ->description(Carbon::now()->format('F Y'))
                ->color('success'),
            Stat::make('Unread', $unreadLeads)
                ->description('Need attention')
                ->color('warning'),
        ];
    }
}
