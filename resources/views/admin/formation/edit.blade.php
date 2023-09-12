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
    <form class="flex flex-col gap-2 " method="POST" action="{{ route('admin.formation.update', $formation) }}">
        @csrf
        @method('PUT')
        <x-form.input name="categorie" :value="$formation->categorie"/>
        <x-form.input name="name" :value="$formation->name"/>
        <x-form.input name="promotion" :value="$formation->promotion"/>
        <x-form.input type="number" name="num_tp" :value="$formation->num_tp"/>
        <x-form.input type="number" name="num_td" :value="$formation->num_td"/>
        <x-form.input name="option" :value="$formation->option"/>
        <x-form.input type="date" name="begin" :value="$formation->begin"/>
        <x-form.input type="date" name="end" :value="$formation->end"/>
        
        <button class="m-2 p-2 rounded-full bg-pink-600 text-white w-fit" type="submit">Modifier</button>
    </form>
</x-app-layout>
