<x-app-layout>
    <x-slot name="header">
        Etudiant
    </x-slot>
    <h1>Student {{ $student->Lastname}}</h1>

    <p> Données de l'étudiant : </p>
    <dl>
        <dt>
            Lastname
        </dt>
        <dd>
            {{ $student->lastname}}
        </dd>
        <dt>
            Firstname
        </dt>
        <dd>{{ $student->firstname}}</dd>
        <dt>
            Email
        </dt>
        <dd>{{ $student->email}}</dd>
        <dt>
            Numéro étudiant
        </dt>
        <dd>{{ $student->num_etu}}</dd>
        <dt>
            Formation
        </dt>
        <dd>{{ $student->formation->name ?? 'N/A' }}</dd>
    </dl>
    <div class="flex flex-col gap-1">
        <a class="m-2 p-2 rounded-full bg-pink-600 text-white w-1/12" href="{{ route('admin.student.index') }}">Retour à
                                                                                                                la
                                                                                                                liste </a>

        @can('update', $student)
            <a class="m-2 p-2 rounded-full bg-pink-600 text-white w-1/12"
               href="{{ route('admin.student.edit', $student) }}">Modifier</a>
        @endcan
        @can('delete', $student)
            <form action="{{ route('admin.student.destroy', $student) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="m-2 p-2 rounded-full bg-red-600 text-white w-1/12" type="submit">Supprimer</button>
            </form>
        @endcan

    </div>
</x-app-layout>
