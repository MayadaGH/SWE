<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use Illuminate\Support\Facades\Validator;

class HomePostController extends Controller
{
    public function __construct(){
      $this->middleware('verified');
    }
    // store = action
    // create = view
    public function create(){
        return view('post/createpost');
    }
    public function store(Request $request){
        $request->validate([
            'body' => 'required',
            'image' => 'required | mimes:jpeg,jpg,png | max:2048',
            ]);
            $post              = new Post();
        $post->body        = $request->input('body');
        $post->user_id     = Auth::user()->id;
        $image             = $request->file('image');
        $new_name          = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path("image"),$image);
        $post->image    = $request->file('image');
        $post->save();
        return redirect(route('home'));
    }

    public function index()
    {
        $post = Post::all();
        $arr = array('post' =>$post);
        return view('home',$arr);
    }
}
