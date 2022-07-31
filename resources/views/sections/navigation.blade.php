<form action="/login" method="post">
    @csrf
    @method('delete')
    <button>Выход</button>
</form>
<hr>
<ul>
    <li><a href="/">Главная</a></li>
    <li><a href="/subscriptions">Подписки</a></li>
    <li><a href="/{{ Auth::user()->name }}">Профиль</a></li>
</ul>
{{ Auth::user()->name }}