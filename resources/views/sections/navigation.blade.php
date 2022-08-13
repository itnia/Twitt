<form action="/login" method="post">
    @csrf
    @method('delete')
    <button>Выход</button>
</form>
<hr>
<ul>
    <li><a id="nav_a" href="/home">Главная</a></li>
    <li><a id="nav_b" href="/correspondence">Переписка</a></li>
    <li><a id="nav_c" href="/{{ Auth::user()->name }}">Профиль</a></li>
</ul>
{{ Auth::user()->name }}


<script>
    $('#nav_a').on('click',function(e){
        e.preventDefault();
        showNavigation('/home');
    });
    $('#nav_b').on('click',function(e){
        e.preventDefault();
        showNavigation('/correspondence');
    });
    $('#nav_c').on('click',function(e){
        e.preventDefault();
        showNavigation('/{{ Auth::user()->name }}');
    });
</script>