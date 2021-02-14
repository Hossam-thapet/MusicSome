<?php

namespace App\Traits;
use DB ;
use Auth ;
use App\Song;
use App\Vote;
use App\Collection;

Trait SongTrait 
{
    public function Vote()
    {
        $singers= Song::select('singer')->orderBy('singer')->get();
        $totalsingers=array();
        foreach($singers as $singer)
        {
            if(!in_array($singer->singer,$totalsingers)){
            array_push($totalsingers,$singer->singer );
            }
        }
        $songs=$this->songs;
        if(Auth::check()){
            $songid=Collection::select("song_id")->where("user_id","=",auth::user()->id)->get();
            $songsid=$songid->toArray();
    
            $checkVote=Vote::select("song_id")->where("user_id","=",auth::user()->id)->get();
            $checkVote=$checkVote->toArray();
                
                return view('songs.index',compact('songs','songsid','checkVote','totalsingers'))
                ->with('i', (request()->input('page', 1) - 1) * 20);
        
    }
    else
     
     return view('songs.index',compact('songs','totalsingers'))
         ->with('i', (request()->input('page', 1) - 1) * 20);
     }
    
}
