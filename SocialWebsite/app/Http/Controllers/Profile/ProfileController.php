<?php

namespace App\Http\Controllers\Profile;

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
}
