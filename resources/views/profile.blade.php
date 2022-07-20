@extends('layouts.main')

@section('title', 'Профиль')

@section('content')
    <div class="col-5">
        <h2>Профиль</h2>
        <a href="/subscriptions">Подписки</a>
    </div>
    <div class="col-3">
        @include('sections.current_topics')
    </div>
    <div class="col-1"></div>
@endsection