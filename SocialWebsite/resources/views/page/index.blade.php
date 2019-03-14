@extends('layouts/app')
@section('content')
<div class="container-fluid">
<h1>All Pages</h1>
@foreach($pages as $page)
<div class="card bg-dark border-light" style="width: 19rem;">
  <div class="card-body text-white">
    <h5 class="card-title font-weight-bolder">{{$page['page_name']}}</h5>
    <h6 class="card-subtitle mb-2 text-muted">page owner</h6>
    <p class="card-text">{{$page['description']}}</p>
    <a href="{{route('page.show', $page['id'])}}" class="btn btn-light text-dark font-weight-bold">Show</a>
    <a href="{{route('page.edit', $page['id'])}}" class="btn btn-success text-light font-weight-bold">Edit</a>
    <form class="float-right" method="POST" action="{{route('page.destroy', $page['id'])}}">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger text-light font-weight-bold">Delete</button>
    </form>
  </div>
</div>
@endforeach

<a href="{{url('/pages/create')}}"><h1>Create Page (it will be appended to Pages dropbox)</h1></a>
</div>
@endsection
