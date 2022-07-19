@extends('layouts.main')

@section('title', 'Главная')

@section('content')
    <div class="col-5">
        @include('sections.message_create')
        <hr>
        @each('sections.message_show', $jobs, 'job')
    </div>
    <div class="col-3">
        <button>Test</button>
        <hr>
    </div>
    <div class="col-1"></div>
@endsection