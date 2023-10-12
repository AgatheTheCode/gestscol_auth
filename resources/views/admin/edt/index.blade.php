<x-app-layout>
    <x-slot name="header">
        Formation
    </x-slot>
    @can('create', App\Models\Edt::class)
        <a href="{{ route('admin.edt.create') }}">Ajouter des heures de cours</a>
    @endcan
    <livewire:edts-filter>
</x-app-layout>
