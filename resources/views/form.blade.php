<h1>créons un nouveau post</h1>

<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <input type="text" name="title">
    <textarea name="context" cols="30" rows="10"></textarea>
    <input type="text" name="password">
    <button type="submit">créer</button>
</form>