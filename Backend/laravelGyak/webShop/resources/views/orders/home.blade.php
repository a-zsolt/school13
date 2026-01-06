@extends('layouts.app')

@section('content')
    <h2>Üdv a rendelés szimulátorában a vevői felületen</h2>
    <p>
        Ez egy gyakorló Laravel projekt, ...
    </p>
    <h3>Próbáld ki:</h3>
    <ul>
        <li>
            <a href="{{route('order.preview')}}">Kosár előnézet</a>
        </li>
        <li>
            <a href="{{route('order.submit', ['mode' => 'ok'])}}">Rendelés leadás - Sikeres</a>
        </li>
        <li>
            <a href="{{route('order.submit', ['mode' => 'stock'])}}">Rendelés leadás - Készlethiány</a>
        </li>
        <li>
            <a href="{{route('order.submit', ['mode' => 'payment'])}}">Rendelés leadás - Fizetési hiba</a>
        </li>
        <li>
            <a href="{{route('order.submit', ['mode' => 'slow'])}}">Rendelés leadás - Lassú szolgáltatás</a>
        </li>
        <li>
            <a href="{{route('order.submit', ['mode' => 'fraud'])}}">Rendelés leadás - Csalás gyanú</a>
        </li>
        <li>
            <a href="{{route('admin.order.show', ['id' => 1])}}">Rendelés megtekintés - Érvénytelen azonosító</a>
        </li>
        <li>
            <a href="{{route('admin.order.show', ['id' => 50])}}">Rendelés megtekintés - Érvényes rendelés</a>
        </li>
        <li>
            <a href="{{route('admin.order.show', ['id' => 150])}}">Rendelés megtekintés - Nem található rendelés</a>
        </li>
    </ul>
@endsection
