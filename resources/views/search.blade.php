<h2>Поиск</h2>
<div class="row">
    <div class="col text-center"><a id="search_a" href=""><span>Популярное</span></a></div>
    <div class="col text-center"><a id="search_b" href=""><span>Последнее</span></a></div>
    <div class="col text-center"><a id="search_c" href=""><span>Люди</span></a></div>
</div>
<div id="search_display"></div>

<script>
    function showSearch(url) {
        $.get(
            url,
            [],
            function (response) {
                $('#search_display').html(response);
                //window.history.pushState(null, null, url);
                document.title = url;
            }
        );
    }
    showSearch('/search/popular');
</script>
<script>
    $('#search_a').on('click',function(e){
        e.preventDefault();
        showSearch('/search/popular');
    });
    $('#search_b').on('click',function(e){
        e.preventDefault();
        showSearch('/search/last');
    });
    $('#search_c').on('click',function(e){
        e.preventDefault();
        showSearch('/search/peoples');
    });
</script>