<?php

namespace App\Http\Controllers;
use DB;
use Auth ;
use App\Collection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
      
    //     $songs = DB::table('users')
    //     ->join('collections', 'user_id', '=', 'users.id')
    //     ->join('songs', 'songs.id', '=', 'song_id')
    //     ->where('user_id', '=', auth::user()->id)
    //     ->get()->sortBy("id");
    //     $i=0 ;
    //     return view('home',compact('songs'))->with('i');
    // }
    
        
}
