@extends('layouts.main')


@section('content')
    <h2>Ветка</h2>
    @include('sections.message_show')
    @include('sections.comment_create')
    <br><hr>
    @each('sections.message_show', $comments, 'message')
@endsection