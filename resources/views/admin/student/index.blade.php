<x-app-layout>
    <x-slot name="header">
        Etudiant
    </x-slot>
    <h3>Student</h3>
    @can('create', App\Models\Student::class)
        <a href="{{ route('admin.student.create') }}">Ajouter un étudiant</a>
    @endcan
    <ul>
        @empty( $student)
            <p>No student found</p>
        @else
            <ul>
                @foreach( $student as $s)
                    <li>
                        <a href="{{ route('admin.student.show', $s) }}"> {{$s -> lastname}} {{$s -> firstname}} </a>
                    </li>
                @endforeach
            </ul>
        @endempty
    </ul>
</x-app-layout>
