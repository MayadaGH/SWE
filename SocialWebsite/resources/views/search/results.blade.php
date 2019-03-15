@extends('layouts.app')
@section('content')
    <h3> Your Search For '{{ Request::input('q')}}'</h3>
    @if(!$users->count())

        <p>No Results Found , Sorry not Sorry :P</p>

    @else

        <div >
            <div >
                @foreach($users as $user)

                    @include('user/partials/userBlocks')

                @endforeach
            </div>
        </div>

    @endif
@endsection
