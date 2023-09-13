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
    <form class="flex flex-col gap-2 " method="POST" action="{{ route('admin.edt.update', $edt) }}">
        @csrf
        @method('PUT')
        <x-form.input name="label" :value="$edt->label"/>
        <x-form.input name="room" :value="$edt->room"/>
        <x-form.input name="teacher" :value="$edt->teacher"/>
        <x-form.input type="date" name="date" :value="$edt->date"/>
        <x-form.input type="time" name="begin" :value="$edt->begin"/>
        <x-form.input type="time" name="end" :value="$edt->end"/>
        <label for="etudiant">Formation :</label>
        <div class="flex flex-row gap-2 items-center flex-wrap ">
                <span class="">
                    <select class="m-2.5 p-2.5" name="formation_id">
                        @foreach($formation as $f)
                            <option @if($f->id == old('formation_id')) selected
                                    value=""{{ $f->id }}"
                                    @else value=""{{ $f->id }} "@endif> {{$f->name}} </option>
                            @endforeach
                    </select>
                </span>
        </div>
        <button class="m-2 p-2 rounded-full bg-pink-600 text-white w-fit" type="submit">Modifier</button>
    </form>
</x-app-layout>
