@extends('blog.base')

@section('title', 'Acceuil du blog')

@section('content')
    <h1>Mon blog</h1>

@foreach ($mosts as $most)
<article>
<h2> {{ $most->title }} </h2>
<p>{{ $most->id }}</p>
<p class="small">
    @if ($most->category)
    Categorie : <strong>{{ $most->category->name }}</strong>@if(!$most->tags->isEmpty()),@endif
    @endif
    @if (!$most->tags->isEmpty())
        @foreach ($most->tags as $tag)
            <span class="badge bg-secondary">
                {{ $tag->name }}
            </span>
        @endforeach
    @endif
</p>
<p>
{{ $most->content }}    
</p> 
   
</article>
<form action="{{ route('blog.edit', ["most" => $most->id]) }}" method="post">
    @csrf
    <button class="btn btn-primary" name="edit" type="submit">edit</button>
</form>
@endforeach

    {{ $mosts->links() }}
@endsection