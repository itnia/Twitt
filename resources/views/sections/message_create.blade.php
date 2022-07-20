<div>
    <form action="/messages" method="post">
        @csrf
        @method('post')
        <div>
            <textarea class="form-control" id="textAreaExample3" rows="1" name="message"></textarea>
        </div>
        <div class="mt-2">
            <input type="submit" value="Отправить" class="float-end">
        </div>

    </form>
</div>


@once
    @push('scripts')
        <script>
            // Ваш JavaScript...
        </script>
    @endpush
@endonce