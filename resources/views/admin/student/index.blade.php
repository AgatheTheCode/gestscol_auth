<x-app-layout>
    <x-slot name="header">
        Etudiant
    </x-slot>
    <h3>Student</h3>

    @can('create', App\Models\Student::class)
        <a href="{{ route('admin.student.create') }}">Ajouter un étudiant</a>
    @endcan
    <div class="stud">
        <livewire:student-filter/>
    </div>
</x-app-layout>
