@extends('layouts.main')


@section('content')
    <h2>Главная</h2>
    @include('sections.message_create')
    <br><hr>
    @each('sections.message_show', $messages, 'message')
@endsection