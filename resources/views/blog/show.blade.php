@extends('blog.base')

@section('title', $most->title)

@section('content')

<article>
<h1> {{ $most->title }} </h1>
<p>
{{ $most->content }}    
</p>  
</article>
   
@endsection