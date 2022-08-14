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

class ServiceController extends Controller
{
    private $url;
    private $userid;

    public function __construct()
    {
        $this->userid = Route::current()->parameter('userid');
        $this->token = Cache::get('token');
        
        $tempurl = new ConfigApiController;
        $this->url = $tempurl->boot();
        
        $this->res = Http::withHeaders([
            'Authentication-Info' => $this->token,
        ])->get($this->url.'service/list')->json();

    }

    public function index()
    {
        $data = $this->res;
        
        return view('service.service_list',['data' => $data, 'userid'=> $this->userid ]);
    }

    public function store(Request $request)
    {
        $resp =  Http::withHeaders([
            'Authentication-Info' => $this->token,
        ])->post($this->url.'service/create',
        [
            'name' => $request->name,
            'fee' => (int)$request->fee
        ]);
        
        return 'Data is created successfully!';
    }
    
    public function update(Request $request)
    {
        
        $resp =  Http::withHeaders([
            'Authentication-Info' => $this->token,
        ])->put($this->url.'service/update',
        [
            'id' => (int)$request->id,
            'name' => $request->name,
            'fee' => (int)$request->fee
        ]);

        // return 'Data is updated successfully!';
    }

    public function destroy(Request $request)
    {   
        $resp = Http::withHeaders([
            'Authentication-Info' => $this->token,
        ])->get($this->url.'service/delete/'.$request->id);

        return 'Data is deleted successfully!';
    }
}
