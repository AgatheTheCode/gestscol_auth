<x-app-layout>
    <x-slot name="header">
        Formation
    </x-slot>
    <h1>Formation {{ $formation->name }}</h1>

    <h3> Données de la formation : </h3>
    <dl class="">
        <div class="flex flex-row">
            <dt>
                Nom :
            </dt>
            <dd>
                {{$formation->name}}
            </dd>
        </div>
        <div class="flex flex-row">

            <dt>
                categorie :
            </dt>
            <dd>{{$formation->categorie}}</dd>
        </div>
        <div class="flex flex-row">

            <dt>
                promotion :
            </dt>
            <dd>{{$formation->promotion}}</dd>
        </div>
        <div class="flex flex-row">

            <dt>
                option :
            </dt>
            <dd>{{$formation->option}}</dd>
        </div>
        <div class="flex flex-row">

            <dt>
                Nombre de TD :
            </dt>
            <dd>{{$formation->num_td}}</dd>
        </div>
        <div class="flex flex-row">

            <dt>
                Nombre de TP :
            </dt>
            <dd>{{$formation->num_tp}}</dd>
        </div>

        @if($formation->begin)
            <div class="flex flex-row">

                <dt>
                    Date de début :
                </dt>
                <dd>{{$formation->begin?->format('d/m/Y')}}</dd>
            </div>
        @endif
        @if($formation->end)
            <div class="flex flex-row">

                <dt>
                    Date de fin :
                </dt>
                <dd>{{$formation->end?->format('d/m/Y')}}</dd>
            </div>
        @endif
    </dl>
    <a class="m-2 p-2 rounded-full bg-pink-600 text-white w-1/12" href="{{ route('admin.formation.index') }}">Retour à
                                                                                                              la
                                                                                                              liste</a>

    <a class="m-2 p-2 rounded-full bg-pink-600 text-white w-1/12"
       href="{{ route('admin.formation.edit', $formation) }}">Edition </a><br>
    <form action="{{ route('admin.formation.destroy', $formation) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="m-2 p-2 rounded-full bg-red-600 text-white w-1/12" type="submit">Supprimer</button>
    </form>
</x-app-layout>
