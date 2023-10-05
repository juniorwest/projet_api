

@forelse ($post->comments as $comment)
    <span>{{ $comment->content }}</span>
@empty
    <span>aucun commentaire</span>
@endforelse