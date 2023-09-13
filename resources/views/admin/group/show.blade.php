<x-app-layout>
    <x-slot name="header">
        Group
    </x-slot>
    <h1>Groupe numero : {{ $group->id }}</h1>

    <h3> Données du groupe : </h3>
    <dl class="">

        <dt>
            Nombre de TD :
        </dt>
        <dd>{{$group->TD_numero}}</dd>
        <dt>
            Nombre de TP :
        </dt>
        <dd>{{$group->TP_numero}}</dd>
        BOUCLE FORMATION PLACEHOLDER
        BOUCLE ETUDIANT PLACEHOLDER
    </dl>
    <a class="m-2 p-2 rounded-full bg-pink-600 text-white w-1/12" href="{{ route('admin.group.index') }}">Retour à
                                                                                                          la
                                                                                                          liste</a>
    @can('update', $group)
        <a class="m-2 p-2 rounded-full bg-pink-600 text-white w-1/12"
           href="{{ route('admin.group.edit', $group) }}">Edition </a><br>
    @endcan
    @can('delete', $group)
        <form action="{{ route('admin.group.destroy', $group) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="m-2 p-2 rounded-full bg-red-600 text-white w-1/12" type="submit">Supprimer</button>
        </form>
    @endcan
</x-app-layout>
