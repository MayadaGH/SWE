@extends('layouts/app')

@section('content')

<form method="POST" action="/pages/{{ $page['id'] }}">
  @csrf
  @method('PATCH')
  <div class="form-group">
    <label for="pageName">Name of your page</label>
    <input type="text" name="page_name" class="form-control {{ $errors->has('page_name') ? "is-invalid" : ""}}" id="pageName" value="{{ $page['page_name'] }}" required>
    @if($errors->count())
    <div class="invalid-feedback">
        @foreach($errors->get('page_name') as $msg)
          {{$msg}}
        @endforeach
    </div>
    @endif
  </div>
  <div class="form-group">
    <label for="pageDescription">Description</label>
    <textarea class="form-control {{ $errors->has('description') ? "is-invalid" : ""}}" name="description" id="pageDescription" rows="3" required>{{ $page['description'] }}</textarea>
    @if($errors->count())
    <div class="invalid-feedback">
        @foreach($errors->get('description') as $msg)
          {{$msg}}
        @endforeach
    </div>
    @endif
  </div>
  <button type="submit" class="btn btn-success">Edit</button>
</form>

@endsection
