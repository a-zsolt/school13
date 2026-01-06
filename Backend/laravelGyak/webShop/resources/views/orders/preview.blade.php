@extends('layouts.app')

@section('content')
    <h2>
        Kosár előnézet
    </h2>

    <p>
        <strong>Rendelés szám: </strong>
        {{$order['customer'] }}
    </p>

    <h3>Tételek: </h3>
    <ul>
        @foreach($order['items'] as $item)
            <li>
                {{$item['name']}} - {{$item['qty']}} db x {{$item['price']}} Ft
            </li>
        @endforeach
    </ul>

    <p>
        <strong>Végösszeg: </strong>
        {{$order['total']}}
    </p>
@endsection
