<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title></title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="layout" content="layout">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-2">
                @include('sections.navigation')
            </div>
            <div class="col-5">
                @yield('content')
                <div id="content"></div>
            </div>
            <div class="col-3">
                @include('sections.current_topics')
            </div>
            <div class="col-1"></div>
        </div>
    </div>

    <script src="/script.js"></script>
    <script>
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
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>