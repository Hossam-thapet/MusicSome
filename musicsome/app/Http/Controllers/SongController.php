<?php

namespace App\Http\Controllers;

use App\Song;
use auth;
use DB ;
use App\Collection;
use App\Vote;
use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::latest()->paginate(20);
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
            ->with('i', (request()->input('page', 1) - 1) * 20);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        if(Auth::check()){
        if(auth::user()->role == "admin"){
        return view('songs.create');
        }
        
    }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            if(auth::user()->role == "admin"){
        $request->validate([
            'name'=>  'nullable',
            'image'=>  'nullable|image|max:2048',
            'song' => 'required|file|mimes:audio/mpeg,mpga,mp3,wav,aac',
            'singer'=> 'nullable',
            'votes'=>'nullable'
        ]);
        $filename= $request->name;
        $name=$_FILES['song']['name'];
        $output = str_replace('_', ' ', $name);
        $audio_file = $request->song;
        $song = rand() . '.' . $audio_file->getClientOriginalExtension();
        $audio_file->move(public_path('audios'), $song);
        $image_file = $request->image; 
        
       if($image_file)
       {
        $image = rand() . '.' . $image_file->getClientOriginalExtension();
        $image_file->move(public_path('images'), $image);  
       }
       else{
           $image ='defultimage' ;
       }
        
        $form_data = array(
            'name'=> $output,
            'song' => $song,
                'image'=>$image ,
                'singer'=>$request->singer
        );

        Song::create($form_data);

        return redirect()->route('songs.index')
            ->with('success', 'Tour created successfully.');
    }}
}

    
    public function destroy(Song $song)
    {
        if(Auth::check()){
            if(auth::user()->role == "admin"){
        $song->delete();
  
        return redirect()->route('songs.index')
                        ->with('success','Song deleted successfully');
            }}
    }
}

