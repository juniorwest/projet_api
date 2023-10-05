@extends('blog.principal')

@section('title', 'Connecter un utilisateur')

@section('content')

<form action="" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" class="form-control" id="name" name="name" value=" {{ old('name') }} ">
        @error('name')
            {{ $message }}
        @enderror
    </div>

    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="text" class="form-control" id="password" name="password" value=" {{ old('password') }} ">
        @error('password')
            {{ $message }}
        @enderror
    </div>
    <a href="{{ route('blog.register') }}">S'enregistrer ici</a><br>
    <button class="btn btn-primary">
        Connexion
    </button>
@endsection