<x-app-layout>
    <x-slot name="header">
        Formation
    </x-slot>
    @can('create', App\Models\Group::class)
        <a href="{{ route('admin.group.create') }}">Ajouter un groupe</a>
    @endcan
    <ul>
        @empty($groups)
            <p>No group found</p>
        @else
            <ul>
                @foreach($groups as $g)
                    <li>
                        <a href="{{ route('admin.group.show', $g) }}">
                            FORMATION_PLACEHOLDER {{$g -> TD_numero }} {{$g -> TP_numero}} </a>
                    </li>
                @endforeach
            </ul>
        @endempty
    </ul>
</x-app-layout>
