<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
		return view('user.index');
	}

	public function edit(){
		return view('user.edit');
	}

	public function store(EditUserRequest $request){
		
		if($request->password === null){
			$data = $request->only('gender', 'phone', 'firstname', 'lastname', 'address');
		}
		else{
			$data = $request->only('gender', 'phone', 'firstname', 'lastname', 'address', 'password');
			$data['password'] = bcrypt($data['password']);
		}
		$user = User::where('email',$request->email);
		if ($user->update($data)) {
			return redirect()->back()->with(['class' => 'success', 'message' => 'Update Success.']);
		}else{
			return redirect()->back()->with(['class' => 'danger', 'message' => 'Error Database.']);
		}
	}
}
