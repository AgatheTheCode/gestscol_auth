<x-app-layout>
    <x-slot name="header">
        Formation
    </x-slot>
    @can('create', App\Models\Formation::class)
        <a href="{{ route('admin.formation.create') }}">Ajouter une formation</a>
    @endcan
    <livewire:formation-filter/>
</x-app-layout>
