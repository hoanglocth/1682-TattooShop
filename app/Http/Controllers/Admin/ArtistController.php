<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ArtistDataTable;
use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index(ArtistDataTable $dataTable)
    {
        return $dataTable->render('admin.artist.index');
    }


    public function create()
    {
        return view('admin.artist.create');
    }

    public function store(Request $request)
    {

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = '/images/artist/' . md5(time()) . '.jpg';
            $file->move(public_path('/images/artist/'), $filename);
        }

        if (
            $artist = Artist::create([
                'name' => $request['name'],
                'img' => $filename,
                'describes' => $request['describes']
            ])
        ) {
            return redirect()->back()->with(['class' => 'success', 'message' => 'Add success']);
        } else {
            return redirect()->back()->with(['class' => 'danger', 'message' => 'Error database']);
        }
    }

    public function remove($id){
        if($artist = Artist::find($id)){
            if($artist->delete()){
                return redirect()->back()->with(['class' => 'success', 'message' => 'Remove success']);
            }
            return redirect()->back()->with(['class' => 'danger', 'message' => 'Error can not be delete']);
        }
        return redirect()->back()->with(['class' => 'danger', 'message' => 'Not found']);
    }
}