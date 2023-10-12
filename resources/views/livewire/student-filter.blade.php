<div>
    <h3 class="font-bold">Student Filter</h3>
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
