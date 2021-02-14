<?php

namespace App\Http\Controllers;
use App\Traits\SongTrait;
use DB ;
use App\Song;
use Illuminate\Http\Request;


 

class SelectController extends Controller
{
   use SongTrait ;
    public function selectamr()
    {
       
        $songs=Song::orderBy('votes', 'DESC')->paginate(3);
        $this->songs =$songs;
        return $this->Vote();
    }
    public function selectrecent()
    {
       
        $songs=Song::orderBy('created_at','Desc')->paginate(3);
        $this->songs =$songs;
        return $this->Vote();
    }
    
    public function Category(Request $request)
    {
        $singer=$request->get('singer');
        
        
        $songs=DB::table('songs')->where("singer", $singer)->paginate(12);
        $this->songs =$songs;
        return $this->Vote();
    }
    
}