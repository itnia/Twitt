


<section class="msg-view">
    <div>
        Message
    </div>
    <button>Коментарий</button>
    <button>Ретвит</button>
    <button>Сообщение</button>
    <button>Закладки</button>    
</section>












<script>
    $(function(){
        $('#form_msg').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: "/",
                type:"POST",
                data:$(this).serialize(),
                success:function(response){
                    console.log(response);
                    e.target.reset();
                },
            });
        });
    });
</script>