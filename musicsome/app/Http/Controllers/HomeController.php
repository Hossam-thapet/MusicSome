<?php

namespace App\Http\Controllers;
use DB;
use Auth ;
use App\Collection;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    
        
}
