<div>

    <h3 class="font-bold">Formation Filter</h3>
    <input type="text" placeholder="search" value="" wire:model.live="search">
    <ul>
        @empty($formations)
            <p>No formation found</p>
        @else
            <ul>
                @foreach($formations as $f)
                    <li>
                        <a href="{{ route('admin.formation.show', $f) }}"> {{$f -> categorie}}, {{$f -> name}}
                                                                                              , {{$f-> promotion}}
                                                                                              , {{$f->option}} </a>
                    </li>
                @endforeach
            </ul>
        @endempty
    </ul>
</div>


