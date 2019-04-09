<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB ;
class UserTableController extends Controller
{
    public function index()
    {
        $users = User::all();
        $arr = array('users' =>$users);
        return view('admin.usertable',$arr);
    }
    public function delete(Request $request)
    {

        DB::table('users')
        ->where('id',$request->id)
        ->delete();
        return redirect(route('users-table'));

    }
    public function show(Request $request)
    {   
        $user = DB::table('users')->where('id',$request->id)->first();
        return view('admin.edit_user_profile',compact('user'));
         

        
    }
}
