<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
        crossorigin="anonymous">
    <title></title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="layout" content="layout">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body style="overflow-y: scroll">     
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class=" col-2 border-start border-end min-vh-100">
                <div class="sticky-top">
                    @include('main.navigation')
                </div>                
            </div>
            <div class="col-6">
                @yield('content')
                <div id="content"></div>
            </div>
            <div class="col-2 border-start border-end min-vh-100">
                <div class="sticky-top">
                    @include('main.current_topics')
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>

    <script src="/script.js"></script>
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
        crossorigin="anonymous">
    </script>
</body>
</html>