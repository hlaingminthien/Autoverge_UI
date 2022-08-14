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

class CustomerController extends Controller
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
        ])->get($this->url.'customer/list')->json();

    }

    public function index()
    {
        $data = $this->res;
        
        return view('customer.customer_list',['data' => $data, 'userid'=> $this->userid ]);
    }

    public function store(Request $request)
    {
        $resp =  Http::withHeaders([
            'Authentication-Info' => $this->token,
        ])->post($this->url.'customer/create',
        [
            'name' => $request->name,
            'phoneNo' => $request->phoneNo, 
            'email' => $request->email, 
            'address' => $request->address,
            'nrc' => $request->nrc
        ]);
        
        return 'Data is created successfully!';
    }
    
    public function update(Request $request)
    {
        $resp =  Http::withHeaders([
            'Authentication-Info' => $this->token,
        ])->post($this->url.'customer/update',
        [
            'id' => (int)$request->id,
            'name' => $request->name,
            'phoneNo' => $request->phoneNo, 
            'email' => $request->email, 
            'address' => $request->address,
            'nrc' => $request->nrc
        ]);

        return 'Data is updated successfully!';
    }

    public function destroy(Request $request)
    {   
        $resp =  Http::withHeaders([
            'Authentication-Info' => $this->token,
        ])->get($this->url.'customer/delete/'.$request->id);

        return 'Data is deleted successfully!';
    }
}
