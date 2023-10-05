@extends('blog.base')

@section('title', 'Modifier un article')

@section('content')

    <form action="" method="post">

        @if (session('success'))
            <div class="alert alert-success">
            {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
            {{ session('error') }}
            </div>
        @endif

        @csrf
        
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control" id="title" name="title" value=" {{ old('title', $most->title) }} ">
            @error('title')
                {{ $message }}
            @enderror
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value=" {{ old('title', $most->slug) }} ">
            @error('slug')
                {{ $message }}
            @enderror
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content"> {{old('content', $most->content)}} </textarea>
            @error('content')
                {{ $message }}
            @enderror
        </div>
        
        <div class="form-group">
            <label for="category">categorie</label>
            <select class="form-control" id="category" name="category_id">
                <option value="">Selectionner une catégorie</option>
                @foreach ($categories as $category)
                    <option @selected(old('category_id', $most->category_id) == $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                {{ $message }}
            @enderror
        </div>
        @php
        $tagsIds = $most->tags()->pluck('id');
        @endphp
        <div class="form-group">
            <label for="tag">Tags</label>
            <select class="form-control" id="tag" name="tags[]" multiple>
                @foreach ($tags as $tag)
                    <option @selected($tagsIds->contains($tag->id)) value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
            @error('tags')
                {{ $message }}
            @enderror
        </div>
       
       
        @if ($most->id)
                <button class="btn btn-primary">modifier</button>
                <button class="btn btn-danger">supprimer</button>
            @else
                <button class="btn btn-primary">créer</button>               
            @endif
    </form>
    
@endsection