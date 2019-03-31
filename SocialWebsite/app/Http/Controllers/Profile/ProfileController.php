<?php

namespace App\Http\Controllers\Profile;
//<<<<<<< HEAD

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

    public function index(){
      $user=Auth::user();
      //return view('/profile/profile',);
      $post = Post::all()->where('user_id',Auth::id());
      $arr = array('post' =>$post);
      return view('/profile/profile',$arr,compact('user'));
    }

<<<<<<< HEAD

=======
    public function GetOthersProfile($id)
    {
        $user = User::where('id' , $id)->first();
        if(!$user)
          {
            abort(404);
          }  

          $post = Post::all()->where('user_id',$id);
          $arr = array('post' =>$post);
          return view('user-profile-data',$arr,compact('user'));
    }
   
>>>>>>> 4e041dced93b7287b4e112f0d10170d03735bd34

    public function getProfile($name)
    {
        $user = User::where('name' , $name)->first();
        if(!$user)
            abort(404);
        return view('profile.index')->with('user' , $user);
    }
}
