<x-app-layout>
    <x-slot name="header">
        Emploi du temps
    </x-slot>
    <h1>Emploi du temps {{ $edt->label }} {{ $edt->date }}</h1>

    <h3> Données de la formation : </h3>
    <dl class="">
        <div class="flex flex-row">
            <dt>
                Libellé
            </dt>
            <dd>
                {{$edt->label}}
            </dd>
        </div>
        <div class="flex flex-row">

            <dt>
                Salle :
            </dt>
            <dd>{{$edt->room}}</dd>
        </div>
        <div class="flex flex-row">

            <dt>
                Professeur :
            </dt>
            <dd>{{$edt->teacher}}</dd>
        </div>
        <div class="flex flex-row">

            <dt>
                date :
            </dt>
            <dd>{{$edt->date}}</dd>
        </div>
        <div class="flex flex-row">

            <div class="flex flex-row">

                <dt>
                    Date de début :
                </dt>
                <dd>{{$edt->begin}}</dd>

                <dt>
                    Date de fin :
                </dt>
                <dd>{{$edt->end}}</dd>
            </div>
            @empty($edt->formation_id)
                <dd> N/A</dd>
            @else
                <ul>
                    <li>
                        <a href="{{ route('admin.formation.show', $edt->formation_id) }}"> {{ $edt->formation->name }} {{ $edt->formation->promotion }}</a>
                    </li>
                </ul>
        @endif
    </dl>
    <a class="m-2 p-2 rounded-full bg-pink-600 text-white w-1/12" href="{{ route('admin.edt.index') }}"> Retour à la liste </a>
    @can('update', $edt)
        <a class="m-2 p-2 rounded-full bg-pink-600 text-white w-1/12"
           href="{{ route('admin.edt.edit', $edt) }}">Edition </a><br>
    @endcan
    @can('delete', $edt)
        <form action="{{ route('admin.edt.destroy', $edt) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="m-2 p-2 rounded-full bg-red-600 text-white w-1/12" type="submit">Supprimer</button>
        </form>
    @endcan
</x-app-layout>
