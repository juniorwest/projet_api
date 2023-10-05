@extends("base")

@section("content")

    <form action="{{ route("auth.login") }}" method="post">

        @csrf
        
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value={{ old('email') }}>
            @error("email")
                {{ $message }}
            @enderror
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" value="password">
            @error("password")
                {{ $message }}
            @enderror
        </div>
        <button>Se connecter</button>
    </form>

@endsection