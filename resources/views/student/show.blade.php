@extends('layout.main')
@section('title', 'Student')
@section('main')
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
    </dl>
    <a  class="m-2 p-2 rounded-full bg-pink-600 text-white w-1/12" href="{{ route('student.index') }}">Retour à la liste </a>
@endsection
