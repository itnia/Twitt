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
            console.log(response);
        },
    });
});