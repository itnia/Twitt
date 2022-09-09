<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebSocket</title>
    @vite('resources/js/app.js')
</head>
<body>
    <form action="">
        <input type="text">
        <input type="button" value="Отправить">
    </form>

    <div id="message_socket"></div>

    <script>
        Echo.channel(`chat`)
            .listen('WebSocket', (e) => {
            console.log(e);
        });
    </script>
</body>
</html>