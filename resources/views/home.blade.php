@extends('layouts.main')

@section('title', 'home')

@section('content')

    @include('section.msg_send')
    @include('section.message')

@endsection