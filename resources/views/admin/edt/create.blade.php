<x-app-layout>
    <x-slot name="header">
        Emploi du temps
    </x-slot>
    <h1 class="m-auto">Ajout d'heures de cours</h1>
    @if($errors->any())

        @foreach($errors->all() as $error)
            <div
                class="m-auto flex flex-row justify-center items-center border border-red-400 text-red-700 px-4 py-3 rounded relative w-1/3"
                role="alert">
                <strong class="font-bold">Attention : </strong>
                <span class="block sm:inline">{{$error}}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path
            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
  </span>
            </div>
        @endforeach

    @endif
    <form class="flex flex-col gap-2 m-auto" method="POST" action="{{ route('admin.edt.store') }}">
        @csrf
        <x-form.input name="label"/>
        <x-form.input name="room"/>
        <x-form.input name="teacher"/>
        <x-form.input type="date" name="date"/>
        <x-form.input type="time" name="begin"/>
        <x-form.input type="time" name="end"/>
        <label for="etudiant">Formation :</label>
        <div class="flex flex-row gap-2 items-center flex-wrap ">
            <select name="formation_id">
                <option value="">-- Formation --</option>
                @foreach($formations as $f)
                    <option
                        @if( $f->id == old('formation_id')) selected @endif
                    value="{{ $f->id }}">{{ "$f->name" }}</option>
                @endforeach
            </select>
        </div>
        <button class="m-2 p-2 rounded-full bg-pink-600 text-white" type="submit">Créer</button>
    </form>
</x-app-layout>
