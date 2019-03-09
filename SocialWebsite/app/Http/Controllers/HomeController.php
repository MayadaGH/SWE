<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function CreatePost(Request $request)
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
        self::ReadPost();

        }
        else
        return view('Post/CreatePost'); 
    }
    public function ReadPost()
    {
        $post = Post::all(); 
        $arr = array('post' =>$post); 
        return view('home',$arr);
    }
    
}
