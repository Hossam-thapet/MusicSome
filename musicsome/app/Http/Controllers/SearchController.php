<?php

namespace App\Http\Controllers;
use App\Traits\SongTrait;
use Illuminate\Http\Request;
use App\Song;
use App\Collection;
use App\Vote;
use DB;
use auth ;
class SearchController extends Controller
{
  use SongTrait;
    function search(Request $request)
    {
     $search=$request->get('search');
     $songs=DB::table('songs')->where('name','like' ,'%'.$search.'%')->paginate(12);
     $this->songs =$songs;
        return $this->Vote();

    }
}
