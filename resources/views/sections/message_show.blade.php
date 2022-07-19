<div>
    Отображение одного сообщения:
    <div>Name, timedate, context-menu</div>
	<div>-------------------------------------------------------</div>
	<div>Message text ...</div>
	<div>-------------------------------------------------------</div>
	<button>Коментарии</button>
	<button>Ретвиты</button>
	<button>Лайки</button>
	<button>Закладки</button>
	<div>-------------------------------------------------------</div>
</div>
<div>{{ $job }}</div>

@once
    @push('scripts')
        <script>
            // Ваш JavaScript...
        </script>
    @endpush
@endonce