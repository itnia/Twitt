@extends('layouts.main')

@section('title', 'Главная')

@section('content')
    <h2>Главная</h2>
    @include('sections.message_create')
    <br><hr>
    <div id="message_subscription"></div>
    
    <script>
        $.get(
            '/message_subscription',
            [],
            function (response) {
                $('#message_subscription').html(response);
                console.log('okey_message_subscription');
            }
        );
        $('#contactForm').on('submit',function(event){
            event.preventDefault();

            let message = $('#message').val();

            $.ajax({
                url: "/messages",
                type:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    message:message,
                },
                success:function(response){
                    $('#contactForm').trigger('reset');
                    $.get(
                        '/message_subscription',
                        [],
                        function (response) {
                            $('#message_subscription').html(response);
                        }
                    );
                },
            });
        });
    </script>
@endsection