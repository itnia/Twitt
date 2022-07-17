<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
</head>
<body>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @include('section.nav')
    @yield('content')

    <script>
        // $(function(){
        //   $('button').click(function(){
        //     $.post("/", {"_token": "{{ csrf_token() }}"},
        //     function(data) {
        //     console.log(data);
        //     });
        //   });
        // });
    </script>
</body>
</html>