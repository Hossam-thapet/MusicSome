@extends('songs.layout')
@extends('songs.nav')

@section('content')

<div class="card-body justify-content-center">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    {{ __('You are logged in!') }}
</div>

    
<div class="container-fluid">
    <div class="audio-controller">
     
        <button  class="playerbutton play btn btn-outline-danger list"  onclick="runnext()" ><i class="fas fa-play"></i></button>
        <button  class="playerbutton pause btn btn-outline-danger list" onclick="pauseit()" ><i class="fas fa-pause"></i></button>
        <button  class="skipbutton  btn btn-outline-danger list" onclick="sikpsong()" ><i class="fas fa-forward"></i></i></button>
    </div>
<div class="row palylist"  >
   
@foreach($songs as $song)
<div class="col-sm-2">

   
        @if($song->image == 'defultimage')         
        <img class="musiclist" src="img/music.jpg" style="border-radius: 50%;" alt="">    
        
    @else
        <img src="{{asset('images/'.$song->image)}}" style="border-radius: 50%;" class="card-img-top-home user" alt="...">
        
        @endif
    </div>
    <div class="col-lg-8" style="padding-bottom:0;">
            <audio  class="player m-auto" id="player-{{$song->id}}"  src="{{asset('audios/'.$song->song)}}" type="audio/ogg"  controls ></audio>
    </div>
    <div class="col-sm-2" style="padding-left: 10px">
    <form action="{{ url('/collection-delete',$song->id) }}" method="POST">
@csrf
@method('DELETE')            
<button type="submit" class="btn btn-danger m-3">remove</button>
</form>
</div>
@endforeach
</div>
</div>
@endsection
