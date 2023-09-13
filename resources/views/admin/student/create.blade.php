<x-app-layout>
    <x-slot name="header">
        Etudiant
    </x-slot>
    <wrap>
        <h1>Ajout d'un éléve</h1>
        @if($errors->any())
            <ul>
                @foreach( $errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        @endif
        <form method="POST" action="{{ route('admin.student.store') }}">
            @csrf
            <x-form.input placeholder="Ammerman" name="lastname" value=""/>
            <x-form.input placeholder="Eve" name="firstname" value=""/>
            <x-form.input type="email" placeholder="eve.ammerman@mail.com" name="email" value=""/>
            <x-form.input type="number" placeholder="ex: 123456789 " name="num_etu" value=""/>
            <select name="formation_id">
                <option value="">-- Formation --</option>
                @foreach ($formations as $f)
                    <option
                        @if( $f->id == old('formation_id')) selected @endif
                    value="{{ $f->id }}">{{ "$f->name" }}</option>
                @endforeach
            </select>

            @foreach($groups as $g)
                <span class="">
                    <input class="m-2.5 p-2.5" type="checkbox" name="groups[]"
                           @if( in_array($g->id, old('groups', [])) ) checked @endif
                    value="{{$g->id}}">
                    TD : {{$g->TD_numero}}  TP: {{$g->TP_numero}} <br>
                </span>
            @endforeach
            <button class="m-2 p-2 rounded-full bg-pink-600 text-white w-1/12" type="submit">Ajouter</button>
        </form>
    </wrap>
</x-app-layout>
