<x-app-layout>
    <x-slot name="header">
        Formation
    </x-slot>
    <h1>Edition d'une formation</h1>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li> {{$error}} </li>
            @endforeach
        </ul>
    @endif
    <form class="flex flex-col gap-2 " method="POST" action="{{ route('admin.group.update', $group) }}">
        @csrf
        @method('PUT')
        <x-form.input type="number" name="TD_numero" :value="$group->TD_numero"/>
        <x-form.input type="number" name="TP_numero" :value="$group->TP_numero"/>
        <label for="etudiant">Etudiants :</label>
        <div class="flex flex-row gap-2 items-center flex-wrap ">

        </div>
        <label for="Formation">Formation :</label>
        <div class="flex flex-row gap-2 items-center flex-wrap ">

        </div>
        <button class="m-2 p-2 rounded-full bg-pink-600 text-white w-fit" type="submit">Modifier</button>
    </form>
</x-app-layout>
