@extends('layouts.app')
@section('content')
     <div class=" text-center"><!--col-3-->
          <div class="center">
               <img src="{!! ($user->profile_photo =='nophoto.jpg'? 'http://ssl.gstatic.com/accounts/ui/avatar_2x.png' : $user->profile_photo ) !!}" class="avatar img-circle img-thumbnail" alt="avatar">
               
               <br>
               <br>
          </div>
          <div class="row">
               <div class="col-sm-4" style="background-color:lavender;">
                    <label for="" style="background-color:lavender;">User Name</label>
                    <p>{!! $user->name; !!}</p>
               </div>
               <div class="col-sm-4" style="background-color:lavender;">
                         <label for="" style="background-color:lavender;">Email</label>
                         <p>{!! $user->email; !!}</p>
               </div>
               <div class="col-sm-4" style="background-color:lavender;">
                         <label for="" >Date Of Birth</label>
                         <p>{!! $user->dob; !!}</p>
               </div>
          </div>
          <div class="row">
               <div class="col-sm-4" style="background-color:lavender;">
                         <label for="" style="background-color:lavender;">Gender</label>
                         <p>{!! $user->gender; !!}</p>
               </div>
               <div class="col-sm-4" style="background-color:lavender;">
                         <label for="" style="background-color:lavender;">country</label>
                         <p>{!! $user->country; !!}</p>
               </div>
               <div class="col-sm-4" style="background-color:lavender;">
                         <label for="" style="background-color:lavender;">Bio</label>
                         <p>{!! $user->autobio; !!}</p>
               </div>
          </div>

     </div>
@endsection