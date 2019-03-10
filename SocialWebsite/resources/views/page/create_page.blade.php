@extends('layouts.app')

@section('content')

<form method="POST" action="/pages/">
  @csrf
  <div class="form-group">
    <label for="pageName">Name of your page</label>
    <input type="text" name="page_name" class="form-control {{ $errors->has('page_name') ? "is-invalid" : ""}}" id="pageName" placeholder="Page name..." required>
    <div class="invalid-feedback">
        @foreach($errors->get('page_name') as $msg)
          {{$msg}}
        @endforeach
    </div>
  </div>
  <div class="form-group">
    <label for="pageDescription">Description</label>
    <textarea class="form-control {{ $errors->has('description') ? "is-invalid" : ""}}" name="description" id="pageDescription" rows="3" placeholder="Page description..." required></textarea>
    <div class="invalid-feedback">
        @foreach($errors->get('description') as $msg)
          {{$msg}}
        @endforeach
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Create</button>
</form>

@endsection
