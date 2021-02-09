<?php

namespace App\Http\Controllers;
use DB ;
use App\Song;
use Illuminate\Http\Request;


class SelectController extends Controller
{
   
    public function selectamr()
    {
        
        $songs=Song::orderBy('votes', 'DESC')->paginate(3);
        return view('songs.selected',compact('songs'));
        
    }
    public function selectlinkin()
    {
        
        $songs=DB::table('songs')->where("singer","like", "linkin_park")->paginate(12);
        return view('songs.selected',compact('songs'))
        ->with('i', (request()->input('page', 1) - 1) * 12);
    }
    public function selectexo()
    {
        
        $songs=DB::table('songs')->where("singer","like", "exo")->paginate(12);
        return view('songs.selected',compact('songs'))
        ->with('i', (request()->input('page', 1) - 1) * 12);
    }
    
    public function selectbts()
    {
        
        $songs=DB::table('songs')->where("singer","like", "bts")->paginate(12);
        return view('songs.selected',compact('songs'))
        ->with('i', (request()->input('page', 1) - 1) * 12);
    }
    
    public function selectall()
    {
        
        $songs=DB::table('songs')->get();
        return view('songs.selected',compact('songs'))
        ->with('i', (request()->input('page', 1) - 1) * 12);
    }
}