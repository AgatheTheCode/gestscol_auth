<div>
    <p>Student Filter</p>
    <input type="text" placeholder="search" value="" wire:model.live="search">
    <ul>
        @empty( $students)
            <p>No student found</p>
        @else
            <ul>
                @foreach( $students as $s)
                    <li>
                        <a href="{{ route('admin.student.show', $s) }}"> {{$s -> lastname}} {{$s -> firstname}} </a>
                    </li>
                @endforeach
            </ul>
        @endempty
    </ul>
</div>
