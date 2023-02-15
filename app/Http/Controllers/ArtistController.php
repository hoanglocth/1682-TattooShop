<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index(){
        $artists = Artist::all();
        return view('artist.index', [
            'artists' => $artists
        ]);
    }

    public function detail($id){
        $artist = Artist::find($id);
        if(!$artist){
            abort(404);
        }
        return view('artist.detail',[
            'artist' => $artist
        ]);
    }
}
