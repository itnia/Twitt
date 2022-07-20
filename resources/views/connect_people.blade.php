@extends('layouts.main')

@section('title', 'На связи')

@section('content')
    <div class="col-5">
        <h2>На связи</h2>
        @foreach($users as $user)
            <div>
                {{ $user->name }}
            </div>
        @endforeach
    </div>
    <div class="col-3">
        @include('sections.current_topics')
    </div>
    <div class="col-1"></div>
@endsection