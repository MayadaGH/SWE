<?php

namespace App\Http\Controllers\Profile;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function __construct(){
      $this->middleware('verified');
    }
    public function index()
    {

        return view('/profile/settings');
    }
    public function getProfile($name)
    {
        $user = User::where('name' , $name)->first();
        if(!$user)
            abort(404);
        return view('profile.index')->with('user' , $user);
    }
}
