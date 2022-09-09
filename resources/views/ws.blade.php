<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebSocket</title>
    @vite('resources/js/app.js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="layout" content="layout">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <form action="/ws/action" method="get" id="formWebSocket">
        @csrf
        <input type="text" name="name" value="" id="name">
        <button>Отправить</button>
    </form>

    <div id="message_socket"></div>

    <script>
        document.onreadystatechange = function () {
            if (document.readyState === 'complete') {
                Echo.channel(`chat`)
                .listen('WebSocket', (e) => {
                    console.log(e.data);
                    $('#formWebSocket').trigger('reset');
                    $('#message_socket').append(e.data + '<br>');
                });
            }
        }

        $('#formWebSocket').on('submit',function(e){
            e.preventDefault();
            $.get(
                '/ws/action',
                {name: $('#name').val()}
            );
        });
    </script>
</body>
</html>