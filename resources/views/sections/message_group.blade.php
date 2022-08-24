<div id="message_show">
    @each('sections.message_show', $messages, 'message')
</div>

<script>
    $('#message_show').on('click',function(e){
        e.preventDefault();
        let nav = e.target;
        showNavigation(nav.getAttribute('href'));
    });
</script>
