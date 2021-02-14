@extends('songs.layout')
@extends('songs.nav')
 
@section('content')


{{-- @for($i=0;$i<count($totalsingers) ; $i++)
    <h1>{{$totalsingers[$i]}}</h1>
@endfor --}}


<div class="row index-container">
<div class="col-sm-1 songers">
    <form action="/category" method="get">
    <div class="row music-type">
        <a  class="btn category active" href="/songs" id="moveto"><h6>All Songs</h6></a>
    </div>
    
    <div class="row music-type">
        
        <a  type="submit"   class="btn category" id="moveto" name="singer" href="/top_votes"  ><h6>Top Rated</h6></a>
    </div>
    <div class="row music-type">
        
        <a  type="submit"   class="btn category" id="moveto" name="singer" href="/recent"  ><h6>Recent</h6></a>
    </div>
    @for($i=0;$i<count($totalsingers) ; $i++)
    <div class="row music-type">
        <button  type="submit"  class="btn category" id="moveto" name="singer" value="{{$totalsingers[$i]}}" ><h6>{{$totalsingers[$i]}}</h6></button>
    </div>
    @endfor
</form>
</div>
<div class="col-sm-11 songs">
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container search">
        <form action="/find" method="get" class="search-form">
            <div class="input-group pt-4 w-50 m-auto">
                <div class="input-group-prepend">
                  <button type="submit" class="btn search" id="basic-addon3"><i class="fas fa-search"></i></button>
                </div>
                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="search">
              </div>
        </form>
    </div>
<div class="container-fluid music-field pt-3" id="container">
    <div class="row ofSongs">
        @foreach($songs as $song)
               <div class="col-lg-2 mt-3">
                <div class="card" >
            @if($song->image == 'defultimage')         
        <img src="img/music.jpg" alt="">    
@else
        <img src="{{asset('images/'.$song->image)}}" class="card-img-top user" alt="...">
        @endif
        <div class="container card-body song-name">
            <p class="card-text text-wrap">{{$song->name}}</p>
           
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
          @if(auth::check())
          @if(in_array($song->id,array_column($songsid,'song_id')))
          
          <button  class="add-to-collection sub-button btn " value="apply" disabled >
            <i class="fas fa-compact-disc"></i>
          </button>
          
        
        @else
       
          <form method="get" action="{{ url('addcollection',$song->id) }}" >
            <button data-song-id="{{$song->id}}"  class="add-to-collection sub-button btn " value="apply"  >
                <i class="fas fa-compact-disc"></i>
              </button>
              
          </form>
       
        @endif
        @endif
        <span> {{$song->votes}}</span>
        <audio  class="player" id="player-{{$song->id}}"  src="{{asset('audios/'.$song->song)}}" type="audio/ogg" ></audio>
            <div class="player-control">
                <button data-song-id="{{$song->id}}" class="playerbutton play sub-button btn " onclick="playmusic(this)" ><i class="fas fa-play"></i></button>
                <button data-song-id="{{$song->id}}" class="playerbutton pause sub-button btn " onclick="pausemusic(this)"><i class="fas fa-pause"></i></button>
            </div>
            @if(auth::check())
            @if(!in_array($song->id,array_column($checkVote,'song_id')))
               <form action="{{ url('vote',$song->id) }}" method="get" >
                <button data-song-id="{{$song->id}}"  class="vote-to-collection sub-button btn " value="apply" id="vote" >
                    <i class="fas fa-thumbs-up"></i>
                  </button>
               </form>
            @else
            <button  class="vote-to-collection sub-button btn " value="apply" id="vote" style="color:#0099cc !important;" disabled>
                <i class="fas fa-thumbs-up"></i>
              </button>
              @endif
              @endif
            </div>
               </div>
            @endforeach
        </div>
    </div>
    </div>
</div>
    
  
    {!! $songs->links() !!}
      
@endsection