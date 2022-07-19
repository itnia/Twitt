<div>
    <form action="/message" method="post">
        @csrf
        @method('post')
        <input type="text" name="message" id="">
        <input type="submit" value="Отправить">
    </form>
</div>


@once
    @push('scripts')
        <script>
            // Ваш JavaScript...
        </script>
    @endpush
@endonce