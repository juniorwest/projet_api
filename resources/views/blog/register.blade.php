@extends('blog.principal')

@section('title', 'Enregistrer un utilisateur')

@section('content')
<form action="" method="post">
    @csrf
   
    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" class="form-control" id="name" name="name" value=" {{ old('name') }} " placeholder="Entrez votre nom">
        @error('name')
            {{ $message }}
        @enderror
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value=" {{ old('email') }} " placeholder="example@gmail.com">
        @error('email')
            {{ $message }}
        @enderror
    </div>


    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="text" class="form-control" id="password" name="password" value=" {{ old('password') }} " placeholder="Entrez un mot de passe">
        @error('mdp')
            {{ $message }}
        @enderror
    </div>
    <a href="{{ route('blog.login') }}">retourner sur la page de connexion</a><br>
    <button class="btn btn-primary">
        Enregistrer
    </button>
</form>        
@endsection