<script>
    function showMyTwits(url) {
        $.get(
            url,
            [],
            function (response) {
                $('#twits').html(response);
                like();
                //window.history.pushState(null, null, url);
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
<div class="row" id="profile_twit">
    <div class="col text-center"><span><a href="/{{ $user->name }}/twits">Твиты</a></span></div>
    <div class="col text-center"><span><a href="/{{ $user->name }}/with_replies">Твиты и ответы</a></span></div>
    <div class="col text-center"><span><a href="/{{ $user->name }}/media">Медиа</a></span></div>
    <div class="col text-center"><span><a href="/{{ $user->name }}/likes">Нравиться</a></span></div>
</div>
<hr>
<div id="twits">
    <script>
        showMyTwits('/{{ $user->name }}/twits');
    </script>
</div>

<script>
    $('#profile_twit').on('click',function(e){
        e.preventDefault();
        let nav = e.target;
        console.log(nav);
        showMyTwits(nav.getAttribute('href'));
    });
</script>
