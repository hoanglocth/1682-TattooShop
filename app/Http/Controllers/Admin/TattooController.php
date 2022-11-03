<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TattooDataTable;
use App\Http\Controllers\Controller;
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
        return view('admin.tattoo.create', compact('categories'));
    }

    public function store(Request $request)
    {
        if (!Category::find($request->category)) {
            return redirect()->back()->with(['class' => 'danger', 'message' => 'Category not found']);
        }

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = '/images/tattoo/' . md5(time()) . '.jpg';
            $file->move(public_path('/images/tattoo/'), $filename);
        }

        if (
            $book = Tattoo::create([
                'name' => $request['name'],
                'img' => $filename,
                'artist' => $request['artist'],
                'price' => $request['price'],
                'describes' => $request['describes'],
                'category_id' => $request['category']
            ])
        ) {
            return redirect()->route('Book.Edit', $book->id)->with(['class' => 'success', 'message' => 'Add success']);
        } else {
            return redirect()->back()->with(['class' => 'danger', 'message' => 'Error database']);
        }
    }
}