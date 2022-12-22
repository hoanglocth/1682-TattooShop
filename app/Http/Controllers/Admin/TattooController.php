<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TattooDataTable;
use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\Category;
use App\Models\Tattoo;
use Illuminate\Http\Request;

class TattooController extends Controller
{

    public function index(TattooDataTable $dataTable)
    {
        return $dataTable->render('admin.tattoo.index');
    }


    public function create()
    {
        $categories = Category::all();
        $artists = Artist::all();
        return view('admin.tattoo.create', compact('categories', 'artists'));
    }

    public function store(Request $request)
    {
        if (!Category::find($request->category)) {
            return redirect()->back()->with(['class' => 'danger', 'message' => 'Category not found']);
        }

        if (!Artist::find($request->artist)) {
            return redirect()->back()->with(['class' => 'danger', 'message' => 'Artist not found']);
        }

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = '/images/tattoo/' . md5(time()) . '.jpg';
            $file->move(public_path('/images/tattoo/'), $filename);
        }

        if (
            $tattoo = Tattoo::create([
                'name' => $request['name'],
                'img' => $filename,
                'artist' => $request['artist'],
                'price' => $request['price'],
                'describes' => $request['describes'],
                'category_id' => $request['category'],
                'artist_id' => $request['artist']
            ])
        ) {
            return redirect()->back()->with(['class' => 'success', 'message' => 'Add success']);
        } else {
            return redirect()->back()->with(['class' => 'danger', 'message' => 'Error database']);
        }
    }

    public function remove($id)
    {
        if ($tattoo = Tattoo::find($id)) {
            if ($tattoo->delete()) {
                return redirect()->back()->with(['class' => 'success', 'message' => 'Remove success']);
            }
            return redirect()->back()->with(['class' => 'danger', 'message' => 'Error can not be delete']);
        }
        return redirect()->back()->with(['class' => 'danger', 'message' => 'Not found']);
    }


    public function edit($id)
    {
        if ($tattoo = Tattoo::find($id)) {
            $categories = Category::all();
            $artists = Artist::all();
            return view('admin.tattoo.edit', compact('tattoo', 'categories', 'artists'));
        }
        return redirect()->back()->with(['class' => 'danger', 'message' => 'Not found']);
    }

    public function update($id, request $request)
    {
        if ($tattoo = Tattoo::find($request->id)) {

            if (!Category::find($request->category)) {
                return redirect()->back()->with(['class' => 'danger', 'message' => 'Category not found']);
            }

            if (!Artist::find($request->artist)) {
                return redirect()->back()->with(['class' => 'danger', 'message' => 'Artist not found']);
            }

            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $filename = '/images/tattoo/' . md5(time()) . '.jpg';
                $file->move(public_path('/images/tattoo/'), $filename);

                $tattoo->update([
                    'name' => $request['name'],
                    'img' => $filename,
                    'artist' => $request['artist'],
                    'price' => $request['price'],
                    'describes' => $request['describes'],
                    'category_id' => $request['category'],
                    'artist_id' => $request['artist']
                ]);
            }else{
                $tattoo->update([
                    'name' => $request['name'],
                    'artist' => $request['artist'],
                    'price' => $request['price'],
                    'describes' => $request['describes'],
                    'category_id' => $request['category'],
                    'artist_id' => $request['artist']
                ]);
            }

            return redirect()->back()->with(['class' => 'success', 'message' => 'Edit success']);
        }
        return response()->json(['error' => 1, 'message' => 'Not Found']);
    }
}