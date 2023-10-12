<x-layout.main title="Tout les éléves">
    <h1>Student</h1>
    <ul>
        @empty($student)
            <p>No student found</p>
        @else
            <livewire:student-filter/>
    @endempty
</x-layout.main>
