<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function portfolio(){
//        dd('here');
        return view('client.portfolio');
    }
}
