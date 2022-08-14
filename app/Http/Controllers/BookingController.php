<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ConfigApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Route;
use Storage;
use Redirect;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    private $url;
    private $userid;
    private $customer;
    private $service;

    public function __construct()
    {
        $this->userid = Route::current()->parameter('userid');
        $this->token = Cache::get('token');
        
        $tempurl = new ConfigApiController;
        $this->url = $tempurl->boot();
        
        $this->res = Http::withHeaders([
            'Authentication-Info' => $this->token,
        ])->get($this->url.'booking/list')->json();

        $this->customer = Http::withHeaders([
            'Authentication-Info' => $this->token,
        ])->get($this->url.'customer/list')->json();

        $this->service = Http::withHeaders([
            'Authentication-Info' => $this->token,
        ])->get($this->url.'service/list')->json();

    }

    public function index()
    {
        $data = $this->res;
        
        return view('booking.booking_list',['data' => $data, 'userid'=> $this->userid, 'customers' => 
        $this->customer, 'services' => $this->service ]);
    }

    public function store(Request $request)
    {
        $resp =  Http::withHeaders([
            'Authentication-Info' => $this->token,
        ])->post($this->url.'booking/create',
        [
            'customerId' => (int)$request->customerId,
            'carNo' => $request->carNo, 
            'service' => $request->service, 
            'note' => $request->note,
            'durationDay' =>(int)$request->durationDay, 
            'durationType' => (int)$request->durationType,
            'status' => (int)$request->status
        ]);
        
        return 'Data is created successfully!';
    }
    
    public function update(Request $request)
    {
        $resp =  Http::withHeaders([
            'Authentication-Info' => $this->token,
        ])->post($this->url.'booking/update',
        [
            'id' => (int)$request->id,
            'customerId' => (int)$request->customerId,
            'carNo' => $request->carNo, 
            'note' => $request->note,
            'service' => $request->service,
            'durationDay' => (int)$request->durationDay, 
            'durationType' => (int)$request->durationType,
            'status' => (int)$request->status
        ]);

        return 'Data is updated successfully!';
    }

    public function destroy(Request $request)
    {   
        $resp =  Http::withHeaders([
            'Authentication-Info' => $this->token,
        ])->get($this->url.'bookin/delete/'.$request->id);

        return 'Data is deleted successfully!';
    }
}
