<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileSettingController extends Controller
{
    public function index()
    {   
        return view('/profile/settings');
    }
    public function updateprofile(Request $request)
    { $ValidateData;
      
      /* 
      $user = User::find(Auth::id());
      $user->name = $request->input('firstname');
      $user->email =$request->input('email');
          $user->save(); */
     return  view('/profile/settings',$request->input());
     /* return Redirect::back(); */
    }
}
