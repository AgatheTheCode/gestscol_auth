<x-app-layout>
    <x-slot name="header">
        Etudiant
    </x-slot>
    <h1>Edition d'un éléve</h1>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li> {{$error}} </li>
            @endforeach
        </ul>
    @endif
    <form method="POST" action="{{ route('admin.student.update', $student) }}">
        @csrf
        @method('PUT')
        <x-form.input name="lastname" :value="$student->lastname"/>
        <x-form.input name="firstname" :value="$student->firstname"/>
        <x-form.input type="email" name="email" :value="$student->email"/>
        <x-form.input type="number" name="num_etu" :value="$student->num_etu"/>
        <label for="formation_id">Formation</label>
        <select name="formation_id">
            @foreach ($formation as $f)
                <option
                    @if( $f->id == old('formation_id')) selected
                    @elseif($f->id == $student->formation_id) selected
                    @endif
                    value="{{ $f->id }}">{{ "$f->name" }}</option>
            @endforeach
        </select>

        @foreach($groups as $g)
            <span class="">
                    <input class="m-2.5 p-2.5" type="checkbox" name="groups[]"
                           @if( in_array($g->id, old('groups', [])) ) checked
                           @elseif( in_array($g->id, $student->groups->pluck('id')->toArray()) ) checked
                           @endif
                           value="{{$g->id}}">
                    TD : {{$g->TD_numero}}  TP: {{$g->TP_numero}} <br>
                </span>
        @endforeach
        <button class="m-2 p-2 rounded-full bg-pink-600 text-white w-1/6" type="submit">Modifier</button>
    </form>
</x-app-layout>
