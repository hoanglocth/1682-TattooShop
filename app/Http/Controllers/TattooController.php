<?php

namespace App\Http\Controllers;

use App\Models\Tattoo;
use Illuminate\Http\Request;

class TattooController extends Controller
{
    
	public function showTattooDetailByID($id,Request $request)
	{
		$data = Tattoo::find($id);
		if($data == null) abort(404);

		return view('tattoo',[
			'tattoo' => $data
		]);
	}
}
