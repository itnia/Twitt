<h2>Поиск</h2>
<div class="row" id="search_nav">
    <div class="col text-center"><span><a href="/search/popular">Популярное</a></span></div>
    <div class="col text-center"><span><a href="/search/last">Последнее</a></span></div>
    <div class="col text-center"><span><a href="/search/peoples">Люди</a></span></div>
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

    $('#search_nav').on('click',function(e){
        e.preventDefault();
        let nav = e.target;
        showSearch(nav.getAttribute('href'));
    });
</script>