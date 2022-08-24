<div href="/{{ $message->user->name }}/status/{{ $message->id }}">
    {{ $message->message }}    
    <form class="like"  name="{{ $message->id }}" style="width:0">
        <input type="hidden">
        <button onclick="event.stopPropagation()">Лайки<span id="like_{{ $message->id }}">{{ $message->likes }}</span></button>
    </form>    
</div>

<hr>