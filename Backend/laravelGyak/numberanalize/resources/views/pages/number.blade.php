@extends('layouts.app')

@section('content')
    <h1>Szám: {{ $num }}</h1>

    <p>
        A szám {{ $isEven ? 'páros' : 'páratlan' }}
    </p>

    <h3>Prímtényezős felbontás</h3>
    <ul>
        @foreach($factors as $factor)
            <li>{{ $factor }}</li>
        @endforeach
    </ul>
@endsection
