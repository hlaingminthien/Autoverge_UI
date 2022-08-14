<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ConfigApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Route;
use Config;
use Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $login_url;
    private $res;
    private $shopid;
    private $userid;
    private $token;
    private $userLevel;

    public function __construct()
    {
        $this->userid = Route::current()->parameter('userid');
        $this->token = Cache::get('token');
        
        $tempurl = new ConfigApiController;
        $this->login_url = $tempurl->boot();
    }

    public function login(Request $request)
    {

        $res = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post($this->login_url.'auth/login', [
            'userName' => $request->userName,
            'password' => $request->password
        ]);
        
        if($res->status() == 200){
            $data = Http::withHeaders([
                'Authentication-Info' => $this->token,
            ])->get($this->login_url.'user/list')->json();
            
            $res1 = $res->json();
            Cache::add('token', $res1['token'], 86400);
            return view('users.user_list',['data' => $data, 'userid' => $res1['userData']['id'], 
            'username' => $res1['userData']['fullName'] ]); 
        }else{
            return 'Login Fail';
        }
    
    }
    
    public function logout(Type $var = null)
    {
        Cache::forget('token');

        $resp = Http::withHeaders([
            'Authentication-Info' => $this->token,
        ])->put($this->login_url.'logout?userid='.$this->userid); 

        return view('users.login');
    }
}
