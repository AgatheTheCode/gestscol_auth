<x-app-layout>
    <x-slot name="header">
    Formation
    </x-slot>
    @can('create', App\Models\Formation::class)
        <a href="{{ route('admin.formation.create') }}">Ajouter une formation</a>
    @endcan
    <ul>
        @empty($formation)
            <p>No formation found</p>
        @else
            <ul>
                @foreach($formation as $f)
                    <li>
                        <a href="{{ route('admin.formation.show', $f) }}"> {{$f -> categorie}}, {{$f -> name}}
                                                                                              , {{$f-> promotion}}
                                                                                              , {{$f->option}} </a>
                    </li>
                @endforeach
            </ul>
        @endempty
    </ul>
</x-app-layout>
