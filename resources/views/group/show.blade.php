<x-layout.main title="Formation">
    <h1>Group {{ $group->id }}</h1>

    <h3> Données de la group : </h3>
    <dl class="">

        <dt>
            Nombre de TD :
        </dt>
        <dd>{{$group->TD_numero}}</dd>
        </div>
        <div class="flex flex-row">

            <dt>
                Nombre de TP :
            </dt>
            <dd>{{$group->TP_numero}}</dd>
        </div>
        BOUCLE FORMATION PLACEHOLDER
        @if($group->students->isNotEmpty())
            <ul>
                @foreach($group->students as $student)
                    <li>
                        <a href="{{ route('admin.student.show', $student) }}"> {{ $student->firstname }} {{ $student->lastname }}</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </dl>
    <a class="m-2 p-2 rounded-full bg-pink-600 text-white w-1/12" href="{{ route('admin.group.index') }}">Retour à
                                                                                                          la
                                                                                                          liste</a>
</x-layout.main>
