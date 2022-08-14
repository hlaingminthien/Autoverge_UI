<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigApiController extends Controller
{
    public function boot()
    {
        $apiurl = 'http://localhost:3000/api/v1/';
        return $apiurl;
    }
}
