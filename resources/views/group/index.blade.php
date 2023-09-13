<x-layout.main title="Tout les éléves">
            Formation
        <ul>
            @empty($group)
                <p>No group found</p>
            @else
                <ul>
                    @foreach($group as $g)
                        <li>
                            <a href="{{ route('admin.group.show', $g) }}">
                                FORMATION_PLACEHOLDER {{$g -> TD_numero }} {{$g -> TP_numero}} </a>
                        </li>
                    @endforeach
                </ul>
            @endempty
        </ul>
</x-layout.main>>
