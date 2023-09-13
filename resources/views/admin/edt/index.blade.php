<x-app-layout>
    <x-slot name="header">
    Formation
    </x-slot>
    @can('create', App\Models\Edt::class)
        <a href="{{ route('admin.edt.create') }}">Ajouter des heures de cours</a>
    @endcan
    <ul>
        @empty($edt)
            <p>Auncun emploi du temps disponible</p>
        @else
            <ul>
                @foreach($edt as $e)
                    <li>
                        <a href="{{ route('admin.edt.show', $e) }}"> {{$e -> label}}, {{$e -> room}}
                                                                                              , {{$e-> teacher}}
                                                                                              , {{$e->date}} ,
                            {{$e->begin}} & {{$e->end}} </a>
                    </li>
                @endforeach
            </ul>
        @endempty
    </ul>
</x-app-layout>
