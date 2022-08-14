<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ConfigApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Route;
use Redirect;

class UserController extends Controller
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
        ])->get($this->url.'user/list')->json();
        
    }

    public function index()
    {
        $data = $this->res;
        
        return view('users.user_list',['data' => $data, 
            'userid'=> $this->userid
        ]);
    }
    
    public function store(Request $request)
    {

        $resp = Http::withHeaders([
            'Authentication-Info' => $this->token,
        ])->post($this->url.'user/create',[
            
            'email' => $request->email,
            'fullName' => $request->fullName, 
            'userRole' => (int)$request->userRole, 
            'phoneNo' => $request->phoneNo,
            'userName' => $request->userName, 
            'password' => $request->password, 
            'isActive' => true
        ])->json();

        return 'Data is created successfully!';
    }
    
    public function update(Request $request)
    {
        
        $resp = Http::withHeaders([
            'Authentication-Info' => $this->token,
        ])->post($this->url.'user/update',[
            'id' => (int)$request->id,
            'email' => $request->email,
            'fullName' => $request->fullName, 
            'userRole' => (int)$request->userRole, 
            'phoneNo' => $request->phoneNo,
            'isActive' => true
        ]);

        return 'Data is updated successfully!';
    }
    
    public function destroy(Request $request)
    {   
        $resp = Http::withHeaders([
            'Authentication-Info' => $this->token,
        ])->post($this->url.'user/update',[
            'id' => (int)$request->id,
            'isActive' => false
        ]);

        return 'Data is successfully deactivated!';
    }
    
    public function active(Request $request)
    {
        $resp = Http::withHeaders([
            'Authentication-Info' => $this->token,
        ])->post($this->url.'user/update',[
            'id' => (int)$request->id,
            'isActive' => true
        ]);

        return 'Data is successfully activated!';
    }
}