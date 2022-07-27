<div>
    {{ $message->message }}
</div>
<div>
    <form class="like"  name="{{ $message->id }}">
        <input type="hidden">
        <button>Лайки<span id="like_{{ $message->id }}">{{ $message->likes }}</span></button>
    </form>

    <a href="/{{ $message->user->name }}/status/{{ $message->id }}">Сылка</a>
</div>
<hr>