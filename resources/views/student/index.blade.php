<x-layout.main title="Tout les éléves">
    <h1>Student</h1>
    <ul>
        @empty($student)
            <p>No student found</p>
        @else
            <ul>
                @foreach($student as $s)
                    <li>
                        <a href="{{ route('student.show', $s) }}"> {{$s -> lastname}} {{$s -> firstname}} </a>
                    </li>
                @endforeach
            </ul>
        @endempty
    </ul>
</x-layout.main>
