<?php

namespace App\Http\Controllers;
use App\Traits\SongTrait;
use App\Song;
use auth;
use DB ;
use App\Collection;
use App\Vote;
use Illuminate\Http\Request;

class SongController extends Controller
{
use SongTrait;
   
    public function index()
    {
        $songs = Song::latest()->paginate(20);
        $this->songs =$songs;
        return  $this->Vote();
        }
    public function create()
    {
        if(Auth::check()){
        if(auth::user()->role == "admin"){
        return view('songs.create');
        }
        
    }
    }
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

