<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    
    public function rating(Request $request)
    {
        $data = $request->only('comment','star_number','user_id','tattoo_id');
        if ($request->rating_id == null) {
            if(Rating::create($data)){
                return redirect()->back()->with(['class' => 'success', 'message' => 'Rating Success.']);
            }else{
                return redirect()->back()->with(['class' => 'danger', 'message' => 'Rating error.']);
            }
        }
        $result = Rating::find($request->rating_id)->update($data);
        if ($result) {
            return redirect()->back()->with(['class' => 'success', 'message' => 'Update Success.']);
        }else{
            return redirect()->back()->with(['class' => 'danger', 'message' => 'Rating error.']);
        }
    }
}
