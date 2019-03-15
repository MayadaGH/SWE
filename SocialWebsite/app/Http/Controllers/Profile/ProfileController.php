<?php

namespace App\Http\Controllers\Profile;

use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;


class ProfileController extends Controller
{
    public function __construct(){
      $this->middleware('verified');
    }
    public function index()
    {   
        return view('/profile/settings');
    }
    public function getprofiledata(){
      $user=Auth::user();
      return view('/profile/profile',compact('user'));
    }
    public function updateprofile(Request $request)
    { $ValidateData;
      
      /* 
      $user = User::find(Auth::id());
      $user->name = $request->input('firstname');
      $user->email =$request->input('email');
          $user->save(); */
     return $request->input();
     /* return Redirect::back(); */
    }

}
