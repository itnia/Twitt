<form action="/login" method="post">
    @csrf
    @method('delete')
    <button>Выход</button>
</form>
<hr>
<ul id="nav">
    <li><a href="/home">Главная</a></li>
    <li><a href="/correspondence">Переписка</a></li>
    <li><a href="/{{ Auth::user()->name }}">Профиль</a></li>
</ul>
<button>{{ Auth::user()->name }}</button>

<script>
    $('#nav').on('click',function(e){
        e.preventDefault();
        let nav = e.target;
        showNavigation(nav.getAttribute('href'));
    });
</script>