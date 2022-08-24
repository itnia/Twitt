<br>
<form action="/login" method="post" class="d-inline-block">
    @csrf
    @method('delete')
    <button>Выход</button>
</form>
<button>{{ Auth::user()->name }}</button>
<hr>
<ul id="nav">
    <li><a href="/home">Главная</a></li>
    <li><a href="#">Обзор</a></li>
    <li><a href="/correspondence">Сообщения</a></li>
    <li><a href="#">Закладки</a></li>
    <li><a href="#">Темы</a></li>
    <li><a href="#">Поиск</a></li>    
    <li><a href="/{{ Auth::user()->name }}">Профиль</a></li>
</ul>

<script>
    $('#nav').on('click',function(e){
        e.preventDefault();
        let nav = e.target;
        showNavigation(nav.getAttribute('href'));
    });
</script>