@extends('layouts.app')

@section('title', 'Mini DempShop - ' . $title)

@section('content')
    <h2>Rendelés feldolgozás</h2>
    <h2>{{$title}}</h2>

    <p>{{$message}}</p>

    @if(!empty($details))
        <h3>Részletek</h3>
        <ul>
            @foreach($details as $key => $value)
                <li>
                    <strong>{{ $key }}:</strong>
                    {{$value}}
                </li>
            @endforeach
        </ul>
    @endif

    <hr>
    <p>
        Aktuális mód: <code>{{$mode}}</code><br>
        Lépj vissza és próbáld ki a linkkel a többi módban is a feldogozást...
        <a href="{{ route('orders.home') }}">Vissza</a>
    </p>

@endsection
