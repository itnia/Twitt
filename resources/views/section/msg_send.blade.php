<section>
    <form method="post" id="form_msg" action="" >
        <input type="text" name="msg" id="">
        <input type="submit" value="Отправить">
    </form>
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
</section>