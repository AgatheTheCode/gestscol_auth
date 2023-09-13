<x-app-layout>
    <x-slot name="header">
        Gestion des Absences
    </x-slot>
    <table>
        <thead>
        <tr>
            <th>Date</th>
            <th>Formation</th>
            <th>TD</th>
            <th>TP</th>
            <th>Nombre d'étudiants</th>
            <th>Heure de début</th>
            <th>Heure de fin</th>
            <th>Salle</th>
            <th>Professeur</th>
        </tr>
        </thead>
        @foreach($edt as $e) @endforeach
        <tr>
            <td>{{$e->date}}</td>
            <td>FORMATION_PLACEHOLDER</td>
            <td>TD_PLACEHOLDER</td>
            <td>TP_PLACEHOLDER</td>
            <td>STUDENT_NUMBER_PLACEHOLDER</td>
            <td>START_TIME_PLACEHOLDER</td>
            <td>END_TIME_PLACEHOLDER</td>
            <td>ROOM_PLACEHOLDER</td>
            <td>PROFESSOR_PLACEHOLDER</td>
        </tr>
    </table>

</x-app-layout>
