@extends('layouts.main')

@section('title', 'Главная')

@section('content')
    <div class="col-5">
        <h2>Главная</h2>
        @include('sections.message_create')
        <br>
        <hr>
        @each('sections.message_show', $messages, 'message')
    </div>
    <div class="col-3">
        @include('sections.current_topics')
    </div>
    <div class="col-1"></div>
@endsection