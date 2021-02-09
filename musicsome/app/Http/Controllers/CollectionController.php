<?php

namespace App\Http\Controllers;

use App\Collection;
use Illuminate\Http\Request;
use App\User;
use App\Song;
use DB ;
use Auth ;

class CollectionController extends Controller
{
    public function index()
    {
        
        
        
        $songs = DB::table('songs')
        ->select('collections.id','songs.image','songs.song')
        ->join('collections', 'song_id', '=', 'songs.id')
        ->join('users', 'users.id', '=', 'user_id')
        ->where('user_id', '=', auth::user()->id)
        ->get()->sortBy("id");
        // dd($songs);
        return view('home',compact('songs'));
    }

    // public function index()
    // {
    //     $collce = Collection::tabele('songs')
    //     ->join('songs', 'song_id', '=', 'songs.id')
    //     ->join('users', 'users.id', '=', 'user_id')
    //     ->where('user_id', '=', auth::user()->id)
    //     ->get()->sortBy("id");
    //     return view('home',compact('songs'));
    // }


    public function addSong(Request $request, $id)
    {
        $songCheck = DB::table('collections')
            ->where('user_id', Auth::user()->id)
            ->where('song_id', $id)
            ->exists();
        //    dd($id);
        if (! $songCheck) {
            
            Collection::create([
                'user_id' => Auth::user()->id,
                'song_id' => $id,
            ]);

        }
        return redirect()->back();
       
        }
    
        public function deletesong(Collection $collection,$id)
        {
            $collection=Collection::find($id);
            // dd($id);
            $collection->delete();
      
            return redirect()->back()
                            ->with('success','Song deleted successfully');
                }
        

    }

