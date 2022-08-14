<?php

namespace App\Exports;
use App\Http\Controllers\ConfigApiController;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class MonthlyPayableExport implements FromView
{
    private $menu_url;
    private $year;
    private $month;
    private $token;
    function __construct($year, $month) 
    {
        $this->token = Cache::get('token');
        $this->year = $year;
        $this->month = $month;

        $tempurl = new ConfigApiController;
        $this->menu_url = $tempurl->boot();
    }

    public function view(): View
    {
        $data = Http::withHeaders([
            'Authentication-Info' => $this->token,
        ])->get($this->menu_url.'generatemonthlydeliverypayablebill?yearpara='.$this->year.
        '&monthpara='.$this->month)->json();
        
        return view('callcenter_reports.delivery_total_monthly_payable_excel', [
            'data' => $data
        ]);
    }
}
