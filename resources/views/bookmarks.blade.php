@extends('layouts.main')

@section('title', 'Закладки')

@section('content')
    <div class="col-5">
        <h2>Закладки</h2>
    </div>
    <div class="col-3">
        @include('sections.current_topics')
    </div>
    <div class="col-1"></div>
@endsection