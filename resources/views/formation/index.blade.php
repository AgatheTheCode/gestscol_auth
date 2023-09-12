<x-layout.main title="Tout les éléves">
<h1>Formation</h1>
    <ul>
    @empty($formation)
        <p>No formation found</p>
    @else
        <ul>
            @foreach($formation as $f)
                <li>
                    <a href="{{ route('formation.show', $f) }}"> {{$f -> categorie}}, {{$f -> name}}, {{$f-> promotion}}, {{$f->option}},tp :  {{$f->num_tp}}; td: {{$f->num_td}} </a>
                </li>
            @endforeach
        </ul>
    @endempty
</ul>
</x-layout.main>>
