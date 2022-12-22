<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Validator;
use Illuminate\Http\Request;
use App\DataTables\CategoriesDataTable;


class CategoryController extends Controller
{

    public function index(CategoriesDataTable $dataTable)
    {
        return $dataTable->render('admin.category.index');
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        
        $validator = Validator::make($request->all(), [
            'name'=>'required|unique:categories'
        ], [
            'name.required' => 'Category not be empty',
            'name.unique' => 'Category must be unique'
        ]);
        if($validator->passes()){
            if($category = Category::create(['name' => $request->name])){
                return redirect()->back()->with(['class' => 'success', 'message' => 'Create success']);
            }
            else{
                return redirect()->back()->with(['class' => 'danger', 'message' => 'Error']);
            }
        }
        return redirect()->back()->with(['class' => 'danger', 'message' => $validator->errors()->first()]);
    }

    public function remove($id){
        if($category = Category::find($id)){
            if($category->delete()){
                return redirect()->back()->with(['class' => 'success', 'message' => 'Remove success']);
            }
            return redirect()->back()->with(['class' => 'danger', 'message' => 'Error can not be delete']);
        }
        return redirect()->back()->with(['class' => 'danger', 'message' => 'Not found']);
    }

    public function edit($id){
        if($category = Category::find($id)){
            return view('admin.category.edit', compact('category'));
        }
        return redirect()->back()->with(['class' => 'danger', 'message' => 'Not found']);
    }
    public function update($id, request $request){
        if($category = Category::find($request->id)){
            $newname = ($request->name !== NULL) ? $request->name : $category->name;
            if($category->update(['name' => $newname])){
                return redirect()->back()->with(['class' => 'success', 'message' => 'Edit success']);
            }
        }
        return response()->json(['error' => 1, 'message' => 'Not Found']);
    }
}
