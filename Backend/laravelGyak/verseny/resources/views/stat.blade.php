Verseny stat

Csapatok:
<ul>
    @foreach($teams as $team)
        <li>
            {{$team->name}}
            <ul>
                Csapat tagjai:
                @foreach($team->students as $student)
                    <li>{{$student->name}}</li>
                @endforeach
            </ul>
        </li>

</ul>
