<x-app-layout>
    <x-slot name="header">
        Etudiant
    </x-slot>
    title="Tout les éléves">
    <h1>Student</h1>
    <a href="{{ route('admin.student.create') }}">Ajouter un étudiant</a>
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
