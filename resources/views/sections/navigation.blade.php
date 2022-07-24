<form action="/login" method="post">
    @csrf
    @method('delete')
    <button>Выход</button>
</form>
<hr>
<ul>
    <li><a href="/">Главная</a></li>
    <li><a href="/subscriptions">Подписки</a></li>
</ul>
{{ Auth::user()->name }}