<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
use App\Collection;
use App\Vote;
use DB;
use auth ;
class SearchController extends Controller
{
  
    function search(Request $request)
    {
     $search=$request->get('search');
     $songs=DB::table('songs')->where('name','like' ,'%'.$search.'%')->paginate(12);
     if(Auth::check()){
        $songid=Collection::select("song_id")->where("user_id","=",auth::user()->id)->get();
        $songsid=$songid->toArray();

        $checkVote=Vote::select("song_id")->where("user_id","=",auth::user()->id)->get();
        $checkVote=$checkVote->toArray();
            
            return view('songs.index',compact('songs','songsid','checkVote'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
       
        }
        else
       { $songsid=array() ;
     return view('songs.index',compact('songs','songsid'))
     ->with('i', (request()->input('page', 1) - 1) * 12);
       }
    }


}
