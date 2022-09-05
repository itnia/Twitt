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
    <title>Posts</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="layout" content="layout">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

    <div class="container">
        <div id="posts"></div>
    </div>

    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
        crossorigin="anonymous">
    </script>
    <script>

        function uplaodPosts (page) {
            $.get(
                page,
                [],
                function (response) {
                    $('#posts').html(response);
                }
            );
        }

        uplaodPosts('/posts/page?page=1');

        $('#posts').on('click', 'a',function(e){
            e.preventDefault();
            uplaodPosts(this.getAttribute('href'));
        });

        $('#posts').on('click', '.post_a', function(e){
            $('#text-modal').html(this.innerHTML);
            $('#staticBackdrop').modal('show');
        });
    </script>



    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-body">
            <div id="text-modal">
                Сдесь вывести заголовок
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        </div>
        </div>
    </div>
    </div>

</body>
</html>