@extends('layouts.app')
@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

     <div class=" text-center"><!--col-3-->
          <div class="center">
               <img src="{{ URL::to('/') }}/uploaded/{{Auth::user()->profile_photo}}" class="avatar img-circle img-thumbnail" alt="avatar">
               
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
     <div class="container">

               <h1 class="text-center"> Posts</h1>
       
                       @foreach($post as $art)
               <div style="background-color: #f2f2f2; width:820px ; height: 500px ; margin:100px; margin-left:200px;">
                 <div style=" font-size: 22px; margin-left: 20px;">
                   <a href="profile/{{$art->user_id}}" >
                  <img src="{{ URL::to('/') }}/uploaded/{{Auth::user()->profile_photo}}" style="width:50px; height:50px;  border-radius:50% ; margin-top: 10px; margin-bottom: 15px;">
                                             {{$art->user->name}}
                   </a>
              @if(Auth::user()->id==$art->user->id)
              <div class="dropdown" style="float:right; margin-top:20px;">
               <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> Edit / Delete 
               <span class="caret"></span></button>
               <ul class="dropdown-menu">
                 <li>
                     <form enctype="multipart/form-data" action="{{route('home-post.show')}}" method="post"> 
                     {{ csrf_field() }}
                     <input type="hidden" name="post_id" value="{{$art->id}}">
                     <input type="submit" name="edit" value=" Edit"  class="btn btn-default">
                     </form> 
                 </li>
                 <li>
                 <form enctype="multipart/form-data" action="{{route('home-post.delete')}}" method="post"> 
                 {{ csrf_field() }}
                 <input type="hidden" name="post_id" value="{{$art->id}}">
                 <input type="submit" name="Delete" value="Delete" class="btn btn-default" >
                 </form>
                 </li>
               </ul>
             </div> 
       
               @endif 
       
                 </div>
       
           <div class="thumbnail" style="margin-left: 10px;" >
           <h5 class="ArticleBody">
                   {{ str_limit(strip_tags($art->body), 50) }}
       
               </h5>
       
                   @if (strlen(strip_tags($art->body)) > 50)
                     ...
       
       
                     <a href='{{ "/read/".$art->id }}' >Read More<i class="fas fa-angle-right"></i></a>
                     <br>
                   @endif
                   <p style="margin-left: 660px;">
                   {{$art->created_at}}
               </p>
            <a href='{{ "/read/".$art->id }}'>
               <img src="/image/{{$art->image}}" class="img-thumbnail" style="margin-top:-20px;">
               <div class="caption">
       
               </div>
             </a>
             @php
                $like_count = 0 ;
                $like_statu = "far fa-thumbs-up";
              @endphp
       
       
              @foreach($art->like as $like)
              @php
       
              if($like->like==1)
              { $like_count++; }
       
              if(Auth::check())
              {
                if($like->like == 1 &&  $like->user_id == Auth::user()->id )
                 $like_statu = "fas fa-thumbs-up";
       
       
              }
       
              @endphp
              @endforeach
       
       
             <div class="row">
       
             <div class="col-sm-3 col-md-6">
               <button type="button" class="like btn btn-light" style="width:420px"  post_id ="{{$art->id}}" >
                 <b> <span class="like_count">{{$like_count}}</span></b>
                 <i class="emoji {{$like_statu}}" ></i> Like
               </button>
       
             </div>
       
             <div class="col-sm-3 col-md-6">
               <button type="button" class="btn btn-light" style="width:390px"><i class="far fa-comment"></i> Comment</button>
       
             </div>
             </div>
           </div>
           </div>
           <br/>
       
                    @endforeach
       
       </div>
       <script>
       $(document).ready(function(){
         $(document).on('click','.like',function()
         {
           var post_id      = $(this).attr('post_id');
           $.ajax({
            type: 'POST',
            url: "{{route('like')}}",
            data:{post_id:post_id,_token:token},
       
            success: function(data){
             if(data.is_like == 1){
               $('*[post_id="'+ post_id +'"]').find('.emoji').removeClass('emoji far fa-thumbs-up').addClass('emoji fas fa-thumbs-up');
               var cu_like = $('*[post_id="'+ post_id +'"]').find('.like_count').text();
               var new_like= parseInt(cu_like) + 1 ;
               $('*[post_id="'+ post_id +'"]').find('.like_count').text(new_like);
             }
             else if(data.is_like == 0){
               $('*[post_id="'+ post_id +'"]').find('.emoji').removeClass('emoji fas fa-thumbs-up').addClass('emoji far fa-thumbs-up');;
               var cu_like = $('*[post_id="'+ post_id +'"]').find('.like_count').text();
               var new_like= parseInt(cu_like)- 1 ;
               $('*[post_id="'+ post_id +'"]').find('.like_count').text(new_like);
             }
           }
          });
         });
       })
       
       
       </script>

@endsection