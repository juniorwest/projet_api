
<h1>Liste des articles</h1>

@if ($posts->count() > 0)
    @foreach ($posts as $post)
    <h3><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->nom }}</a></h3>
    @endforeach
@else 
    <span>aucun post en base de données</span>
@endif
    