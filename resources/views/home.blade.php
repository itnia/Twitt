@extends('layouts.main')

@section('title', 'Главная')

@section('content')
    <h2>Главная</h2>
    @include('sections.message_create')
    <br><hr>
    <div id="message_subscription"></div>
    
    <script>
        function showMessagesSubscriptions() {
            $.get(
                '/message_subscription',
                [],
                function (response) {
                    $('#message_subscription').html(response);
                    like();
                    console.log('okey_message_subscription');
                }
            );
        }
        showMessagesSubscriptions();
        $('#contactForm').on('submit',function(event){
            event.preventDefault();

            let message = $('#message').val();

            $.ajax({
                url: "/messages",
                type:"POST",
                data:{
                    message:message,
                },
                success:function(){
                    $('#contactForm').trigger('reset');
                    showMessagesSubscriptions();
                },
            });
        });
    </script>
@endsection