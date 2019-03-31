@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Add Friends</h1>
  <div class="row">
  @foreach($candidateUsers as $user)
  <div class="col-md-3 mb-4">
    <div class="card">
      <img src="{{asset($user->profile_photo)}}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{$user->name}}</h5>
        <p class="card-text">
          <b>Gender: </b> {{$user->genderName}}<br>
          <b>Age:</b> {{$user->age}}<br>
          <b>About: </b> {{str_limit($user->autobio, 40)}}<br>
        </p>
        <button href="javascript:void(0);" class="btn btn-primary send-friend-request" data-user-id="{{$user->id}}">Send Friend Request</button>
      </div>
    </div>
  </div>
  @endforeach
  </div>
  <div class="row">
    {{ $candidateUsers->links() }}
  </div>
</div>
<script>
  $(".send-friend-request").on('click', function(){
    var userID = $(this).data('user-id');
    $.ajax({
      'url' : {{ route('user-friend.store') }},
      'method' : 'POST',
      data: { user_id: userID, _token: token },
      success: function(data){
        console.log(data);
      },
      error: function(data){
        alert("Failed to send a friend request.");
      }

    });
  });

</script>
@endsection
