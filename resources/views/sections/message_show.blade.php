<div>
	{{ $message->message }}
</div>
<div>
	<button>Коментарии</button>
	<button>Ретвиты</button>
	<button>Лайки</button>
	<button>Закладки</button>
</div>
<hr>

@once
    @push('scripts')
        <script>
            // Ваш JavaScript...
        </script>
    @endpush
@endonce