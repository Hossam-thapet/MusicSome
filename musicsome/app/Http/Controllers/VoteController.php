<?php

namespace App\Http\Controllers;
use DB;
use Auth; 
use App\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function Vote($id)
    {
        $songVote = DB::table('votes')
            ->where('user_id', Auth::user()->id)
            ->where('song_id', $id)
            ->exists();
           
        if (! $songVote) {
      
            $vote=Vote::create([
                'user_id' => Auth::user()->id,
                'song_id' => $id,
            ]);
           
            DB::table('songs')
        ->where('id', $id)
         ->increment('votes');

        }
       
       return redirect()->back();
    }
}
