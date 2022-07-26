<div>
    <form id="contactForm">
        <input type="hidden" name="message_id" value="{{ $message->id }}" id="message_id">
        <div>
            <textarea class="form-control" rows="1" name="message" id="message"></textarea>
        </div>
        <div class="mt-2">
            <input type="submit" value="Коментировать" class="float-end">
        </div>
    </form>
</div>