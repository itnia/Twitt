@extends('layouts.main')

@section('title', 'Ветка')

@section('content')
    <h2>Ветка</h2>
    @include('sections.message_show')
    @include('sections.comment_create')
    <br><hr>
    <div id="comments"></div>

    <script>
        function showComments() {
            $.get(
                '/{{ $message->id }}/message_comment',
                [],
                function (response) {
                    $('#comments').html(response);
                    like();
                    console.log('okey_comments');
                }
            );
        }
        showComments();
        $('#contactForm').on('submit',function(event){
            event.preventDefault();

            let message = $('#message').val();
            let message_id = $('#message_id').val();

            $.ajax({
                url: "/messages",
                type:"POST",
                data:{
                    message:message,
                    message_id:message_id,
                },
                success:function(){
                    $('#contactForm').trigger('reset');
                    showComments();
                },
            });
        });
    </script>
@endsection