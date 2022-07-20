@extends('layouts.main')

@section('title', 'Уведомления')

@section('content')
    <div class="col-5">
        <h2>Уведомления</h2>
    </div>
    <div class="col-3">
        @include('sections.current_topics')
    </div>
    <div class="col-1"></div>
@endsection