<?php

namespace App\Exports;
use App\Http\Controllers\ConfigApiController;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class OrderExport implements FromView
{
    private $menu_url;
    private $shopid;
    private $userid;
    private $token;
    function __construct($startDate, $endDate, $shopid) 
    {
        $this->shopid = $shopid;
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
        ])->get($this->menu_url.'orderreportbydaterange?shopid='.$this->shopid.'&startdate='.$this->startDate.
        '&enddate='.$this->endDate)->json();
        
        return view('callcenter_reports.order_report_excel', [
            'data' => $data
        ]);
    }
}
