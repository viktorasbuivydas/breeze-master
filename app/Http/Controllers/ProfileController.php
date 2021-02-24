<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $user = auth()->user();
        return view('profile.index', compact('user'));
    }
    public function update($id, ProfileRequest $request){
        $user = User::find($id);
        if(!empty($request->name))
            $user->name = $request->name;

        if(!empty($request->email))
            $user->email = $request->email;

        if(!empty($request->new_password))
            $user->password = Hash::make($request->new_password);

        $user->save();
        return redirect()->route('profile.index')->with('status', 'Successfully updated your information');
    }
}
