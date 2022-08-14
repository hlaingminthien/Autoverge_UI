<?php

namespace App\Exports;
use App\Http\Controllers\ConfigApiController;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class OnlinePaymentExport implements FromView
{
    private $pay_url;
    private $shopid;
    private $userid;
    private $token;
    function __construct($startDate, $endDate) 
    {
        $this->token = Cache::get('token');
        $this->startDate = $startDate;
        $this->endDate = $endDate;

        $tempurl = new ConfigApiController;
        $this->pay_url = $tempurl->bootpay();
    }

    public function view(): View
    {
        $data = Http::withHeaders([
            'Authentication-Info' => $this->token,
        ])->get($this->pay_url.'getpaymenttransactions?startdate='.$this->startDate.
        '&enddate='.$this->endDate)->json();
        
        // dd($data);
        return view('callcenter_reports.online_payment_report_excel', [
            'data' => $data
        ]);
    }
}
