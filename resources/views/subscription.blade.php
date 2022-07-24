@extends('layouts.main')


@section('content')
    <h2>Подписки</h2>
    @foreach($users as $user)
        <div>
            {{ $user->name }}
        </div>
        @if(!$user->subscription_id)
        <form action="/subscriptions" method="post">
            @csrf
            <input type="hidden" name="subscription_id" value="{{ $user->id }}">
            <button>Подписка</button>
        </form>
        @else
        <form action="/subscriptions" method="post">
            @csrf
            @method('delete')
            <input type="hidden" name="subscription_id" value="{{ $user->id }}">
            <button>Отмена</button>
        </form>
        @endif
    @endforeach
@endsection