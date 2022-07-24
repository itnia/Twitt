<div>
    <form action="/messages" method="post">
        @csrf
        @method('post')
        <input type="hidden" name="message_id" value="{{ $message->id }}">
        <div>
            <textarea class="form-control" id="textAreaExample3" rows="1" name="message"></textarea>
        </div>
        <div class="mt-2">
            <input type="submit" value="Коментировать" class="float-end">
        </div>
    </form>
</div>