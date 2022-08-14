function like() {
    $('.like').off('submit');
    $('.like').on('submit',function(e){
        e.preventDefault();
        let id = $(this).attr('name');
        $.post(
            `/messages/like/${id}`,
            [],
            function (response) {
                console.log(response);
                $(`#like_${id}`).html(response);
            }
        );
    });
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'X-Header-Layout': $('meta[name="layout"]').attr('content')
    }
});

let url = window.location.pathname;
console.log(url);
function showNavigation(url) {
    $.get(
        url,
        [],
        function (response) {
            $('#content').html(response);
            like();
            window.history.pushState(null, null, url);
            document.title = url;
        }
    );
}
showNavigation(url);
function showThemes() {
    $.get(
        '/themes',
        [],
        function (response) {
            $('#themes').html(response);
        }
    );
}
showThemes();

$(document).ready(function() {
    $("#search").keyup(function() {

        var name = $('#search').val();

        if (name === "") {
            $("#display").html("");
        }
        else {
            $.post(
                '/search',
                {search:name},
                function(response) {
                    $("#display").html(response);
                }
            );
        }
    });
});
$('#search_get').on('submit',function(e){
    e.preventDefault();
    showNavigation('/search');
});