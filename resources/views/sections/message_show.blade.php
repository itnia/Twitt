<div>
    {{ $message->message }}
</div>
<div>
    <form action="/messages/like/{{ $message->id }}" method="post">
        @csrf
        @method('post')
        <button>
            Лайки{{ $message->likes }}
        </button>
    </form>
    <a href="/{{ $message->user->name }}/status/{{ $message->id }}">Сылка</a>
</div>
<hr>