<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
class HomePostController extends Controller
{
    public function Create_post(Request $request)
    {
        if($request->isMethod('POST'))
    	{
        $request->validate([
        'body' => 'required',
        'image' => 'required | mimes:jpeg,jpg,png | max:2048',
        ]);
        $post              = new Post(); 
        $post->body        = $request->input('body');
        $post->user_id     = Auth::user()->id;
        $image             = $request->file('image'); 
        $new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path("image"),$image);
        $post->image    = $request->file('image');
        $post->save();
        return redirect(route('home'));
        }
        else
        return view('Post/CreatePost'); 
    }
    public function index()
    {
        $post = Post::all(); 
        $arr = array('post' =>$post); 
        return view('home',$arr);
    }
}
