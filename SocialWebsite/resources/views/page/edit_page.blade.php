@extends('layouts/app')

@section('content')

<form method="POST" action="/pages/{{ $page['id'] }}">
  @csrf
  @method('PATCH')
  <div class="form-group">
    <label for="pageName">Name of your page</label>
    <input type="text" name="page_name" class="form-control" id="pageName" value="{{ $page['page_name'] }}">
  </div>
  <div class="form-group">
    <label for="pageDescription">Description</label>
    <textarea class="form-control" name="description" id="pageDescription" rows="3">{{ $page['description'] }}</textarea>
  </div>
  <button type="submit" class="btn btn-success">Edit</button>
</form>

@endsection
