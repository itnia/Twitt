<script>
    function showMyTwits(url) {
        $.get(
            url,
            [],
            function (response) {
                $('#twits').html(response);
                like();
                window.history.pushState(null, null, url);
                document.title = url;
            }
        );
    }
</script>

<br>
<div>{{ $user->name }}</div>
<br>
<a href="/subscriptions">{{ 0 }} в читаемых</a>
<a href="/subscriptions_is">{{ 0 }} читателей</a>
<br><br>
<div class="row">
    <div class="col text-center"><a id="a_a" href="/{{ $user->name }}"><span>Твиты</span></a></div>
    <div class="col text-center"><a id="a_b" href="/{{ $user->name }}/with_replies"><span>Твиты и ответы</span></a></div>
    <div class="col text-center"><a id="a_c" href="/{{ $user->name }}/media"><span>Медиа</span></a></div>
    <div class="col text-center"><a id="a_d" href="/{{ $user->name }}/likes"><span>Нравиться</span></a></div>
</div>
<hr>
<div id="twits">
    <script>
        showMyTwits('/{{ $user->name }}/twits');
    </script>
</div>

<script>
    $('#a_a').on('click',function(e){
        e.preventDefault();
        showMyTwits('/{{ $user->name }}/twits');  // твиты
    });
    $('#a_b').on('click',function(e){
        e.preventDefault();
        showMyTwits('/{{ $user->name }}/with_replies');  // твиты и ответы
    });
    $('#a_c').on('click',function(e){
        e.preventDefault();
        showMyTwits('/{{ $user->name }}/media');  // медиа
    });
    $('#a_d').on('click',function(e){
        e.preventDefault();
        showMyTwits('/{{ $user->name }}/likes');  // нравиться  
    });
</script>
