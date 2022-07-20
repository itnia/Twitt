<form action="/login" method="post">
    @csrf
    @method('delete')
    <button>Выход</button>
</form>
<hr>
<ul>
    <li><a href="/">Главная</a></li>
    <li><a href="/explore">Обзор</a></li>
    <li><a href="/notifications">Уведомления</a></li>
    <li><a href="/correspondence">Сообщения</a></li>
    <li><a href="/bookmarks">Закладки</a></li>
    <li><a href="{{ route('lists', ['user' => Auth::user()->name]) }}">Списки</a></li>
    <li><a href="{{ route('profile', ['user' => Auth::user()->name]) }}">Профиль</a></li>
</ul>