<div>
    <h3 class="font-bold">Recherche Emplois du temps</h3>
    <div class="form-group">
        <label for="magic">Recherche Magique*</label>
        <input type="text" placeholder="Recherche Magique*" name="search" value="" wire:model.live="form.magic"
               id="magic">
        <legend class="italic">*Recherchez tout ce que vous voulez ici (sauf dates & tp / td)</legend>
        <div class="m-2 p-2">
            <label for="date">Date du cours</label>
            <input type="date" required pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}" placeholder="Date" name="date" value=""
                   wire:model.live="form.date" id="date">
            <label for="time_start">Heure de début</label>
            <input type="time" name="Heure de début" value="" wire:model.live="form.time_start" id="time_start">
            <label for="time_end">Heure de Fin</label>
            <input type="time" name="Heure de fin" value="" wire:model.live="form.time_end" id="time_end">
        </div>
    </div>
    <ul>
        @empty($magic)
            <p>Aucun emploi du temps disponible</p>
        @else
            @foreach($magic as $m)
                @php
                    $jours = [1=>'Lundi',2=>'Mardi',3=>'Mercredi',4=>'Jeudi',5=>'Vendredi',6=>'Samedi' ];
                            //Our YYYY-MM-DD date string.
                            $date = $m->date;
                            //Convert the date string into a unix timestamp.
                            $unixTimestamp = strtotime($date);
                            //Get the day of the week using PHP's date function.
                            $dayOfWeek = date("w", $unixTimestamp);
                            $weekNumber = date("W", $unixTimestamp);
                            $day = date("d", $unixTimestamp);
                            $joursIndex = $dayOfWeek;
                            echo 'semaine n° '.$weekNumber;
                @endphp
                <li>
                    <a href="{{ route('admin.edt.show', $m) }}"> {{$m->label}}, {{$m->room}}, {{$m->teacher}}</a>
                </li>
                <table class="calendar">
                    <thead>
                    <tr>
                        <th>Heure</th>
                        <th>Lundi</th>
                        <th>Mardi</th>
                        <th>Mercredi</th>
                        <th>Jeudi</th>
                        <th>Vendredi</th>
                        <th>Samedi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 8; $i < 19; $i++)
                        <tr>
                            <td>{{ $i }}</td>
                            @for($j = 1; $j < 7; $j++)
                                <td>
                                    @if($joursIndex == $j)
                                        @php
                                        var_dump($m->begin);
                                        @endphp
                                        @if($m->begin >= $i)

                                        @endif
                                    @endif
                                </td>
                            @endfor
                        </tr>
                    @endfor
                    </tbody>
                </table>
            @endforeach
        @endempty
    </ul>
</div>
