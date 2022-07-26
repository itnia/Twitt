@extends('layouts.main')


@section('content')
    <h2>Ветка</h2>
    @include('sections.message_show')
    @include('sections.comment_create')
    <br><hr>
    <div id="comments"></div>    

    <script>
        $.get(
            '/{{ $message->id }}/message_comment',
            [],
            function (response) {
                $('#comments').html(response);
                console.log('okey_comments');
            }
        );
        $('#contactForm').on('submit',function(event){
            event.preventDefault();

            let message = $('#message').val();
            let message_id = $('#message_id').val();

            $.ajax({
                url: "/messages",
                type:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    message:message,
                    message_id:message_id,
                },
                success:function(response){
                    $('#contactForm').trigger('reset');
                    $.get(
                        '/{{ $message->id }}/message_comment',
                        [],
                        function (response) {
                            $('#comments').html(response);
                        }
                    );
                },
            });
        });
    </script>
@endsection