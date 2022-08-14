<?php

namespace App\Exports;
use App\Http\Controllers\ConfigApiController;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class WeeklyReceivableExport implements FromView
{
    private $menu_url;
    private $userid;
    private $token;
    function __construct($startDate, $endDate) 
    {
        $this->token = Cache::get('token');
        $this->startDate = $startDate;
        $this->endDate = $endDate;

        $tempurl = new ConfigApiController;
        $this->menu_url = $tempurl->boot();
    }

    public function view(): View
    {
        $data = Http::withHeaders([
            'Authentication-Info' => $this->token,
        ])->get($this->menu_url.'generateweeklydeliverybill?startdate='.$this->startDate.
        '&enddate='.$this->endDate)->json();
        
        return view('callcenter_reports.delivery_total_weekly_receivable_excel', [
            'data' => $data
        ]);
    }
}
