<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class checkuser extends Controller
{


    public function check()
    {
        return view('dashboard');
    }
}
