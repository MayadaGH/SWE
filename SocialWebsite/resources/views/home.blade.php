@extends('layouts.app')
@section('content') 

   <div class="container"> 
   	
   	<h1 class="text-center"> Posts</h1>

   		   @foreach($post as $art)    
        <div style="background-color: #f2f2f2; width:820px ; height: 500px ; margin:100px; margin-left:200px;">     
          <div style=" font-size: 22px; margin-left: 20px;">
            <a href="profile/{{$art->user_id}}" >
           <img src="/{{$art->user->profile_photo}}" style="width:50px; height:50px;  border-radius:50% ; margin-top: 10px; margin-bottom: 15px;">
                                      {{$art->user->name}}
            </a> 
          </div> 
        
    <div class="thumbnail" style="margin-left: 10px;" >
    <p class="ArticleBody">
            {{ str_limit(strip_tags($art->body), 50) }}

        </p>

            @if (strlen(strip_tags($art->body)) > 50)
              ... 
             
              
              <a href='{{ "/read/".$art->id }}' >Read More<i class="fas fa-angle-right"></i></a>
              <br>
            @endif

     <a href='{{ "/read/".$art->id }}'>
        <img src="/image/{{$art->image}}" class="img-thumbnail" >
        <div class="caption">
            
        </div>
      </a>
     
     
       
        <p style="margin-left: 660px;"> 
          {{$art->created_at}}
        </p>

         
    
    </div>
    </div>
    <br/>
    
             @endforeach
 
</div>

@endsection
