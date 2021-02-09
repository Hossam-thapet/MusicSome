@extends('songs.layout')

 
@section('content')

<div class="container-fluid music-field pt-3" id="container">
    <div class="row ofSongs">
        @foreach($songs as $song)
               <div class="col-md-3 mt-3">
                <div class="card" >
            @if($song->image == 'defultimage')         
        <img src="img/music.jpg" alt="">    
@else
        <img src="{{asset('images/'.$song->image)}}" class="card-img-top user" alt="...">
        @endif
        <div class="container card-body song-name">
            <p class="card-text text-wrap">{{$song->name}}</p>
            <p style="color: white;">Votes: {{$song->votes}}</p>
            @if(Auth::check())
            @if(auth::user()->role === "admin")
            <form action="{{ route('songs.destroy',$song->id) }}" method="POST" class="deleteform">
                @csrf
                @method('DELETE')
    
                <button type="submit" class="btn delete-song">x</button>
            </form >
            @endif
            @endif
          </div>

          

            </div>
            
            <audio  class="player" id="player-{{$song->id}}"  src="{{asset('audios/'.$song->song)}}" type="audio/ogg" ></audio>
            <div class="player-control">
                <button data-song-id="{{$song->id}}" class="playerbutton play sub-button btn " onclick="playmusic(this)" ><i class="fas fa-play"></i></button>
                <button data-song-id="{{$song->id}}" class="playerbutton pause sub-button btn " onclick="pausemusic(this)"><i class="fas fa-pause"></i></button>
            </div>
           
               </div>
            @endforeach
        </div>
    </div>
    </div>
</div>
@endsection