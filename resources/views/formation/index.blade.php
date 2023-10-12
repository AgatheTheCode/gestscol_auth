<x-layout.main title="Tout les éléves">
    <h1>Formation</h1>
    <ul>
        @empty($formation)
            <p>No formation found</p>
        @else
            <livewire:formation-filter/>
    @endempty

</x-layout.main>>
