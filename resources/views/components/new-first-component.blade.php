<div>
    <h2>Coucou les amis de {{ $name }} </h2>

    

    @foreach ($tags as $tag)
        {{$tag}}
    @endforeach

    {{ $subtitle }}
</div>