@foreach ($posts as $post)
    <div class="post" value="{{ $post->id }}">
        <div class="post_a">{{ $post->b }}</div>
        <!-- <div>{{ $post->c }}</div>
        <div>{{ $post->d }}</div>
        <div>{{ $post->e }}</div>
        <div>{{ $post->f }}</div>
        <div>{{ $post->g }}</div>
        <div>{{ $post->h }}</div>
        <div>{{ $post->i }}</div>
        <div>{{ $post->j }}</div> -->
        <hr>
    </div>
@endforeach

{{ $posts->links() }}

