function like() {
    $('.like').off('submit');
    $('.like').on('submit',function(e){
        e.preventDefault();
        let id = $(this).attr('name');
        $.post(
            `/messages/like/${id}`,
            [],
            function (response) {
                console.log(response);
                $(`#like_${id}`).html(response);
            }
        );
    });
}