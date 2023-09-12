<x-app-layout>
    <x-slot name="header">
    Formation
    </x-slot>

    <a href="{{ route('admin.formation.create') }}">Ajouter une formation</a>

    <ul>
        @empty($formation)
            <p>No formation found</p>
        @else
            <ul>
                @foreach($formation as $f)
                    <li>
                        <a href="{{ route('admin.formation.show', $f) }}"> {{$f -> categorie}}, {{$f -> name}}
                                                                                              , {{$f-> promotion}}
                                                                                              , {{$f->option}},tp
                                                                                              : {{$f->num_tp}};
                                                                                              td: {{$f->num_td}} </a>
                    </li>
                @endforeach
            </ul>
        @endempty
    </ul>
</x-app-layout>