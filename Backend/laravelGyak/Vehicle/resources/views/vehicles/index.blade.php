@extends('layouts.app')

@section('content')
    <div class="columns is-multiline">
        <div class="column is-one-third">
            <div class="card has-background-dark">
                <div class="card-content has-text-centered">
                    <p class="title is-4">{{ $stats['numOfVehicles'] }}</p>
                    <p class="subtitle is-6">Összes jármű</p>
                </div>
            </div>
        </div>

        <div class="column is-one-third">
            <div class="card has-background-success-light">
                <div class="card-content has-text-centered">
                    <p class="title is-4 has-text-success-dark">{{ $stats['availableVehicles'] }}</p>
                    <p class="subtitle is-6 has-text-success-dark">Elérhető</p>
                </div>
            </div>
        </div>

        <div class="column is-one-third">
            <div class="card has-background-danger-light">
                <div class="card-content has-text-centered">
                    <p class="title is-4 has-text-danger-dark">{{ $stats['unavailableVehicles'] }}</p>
                    <p class="subtitle is-6 has-text-danger-dark">Foglalt</p>
                </div>
            </div>
        </div>
    </div>


    <div class="tabs">
        <ul>
            <li @if($sort === 'name') class="is-active" @endif><a href="/vehicles/sort/name">Név</a></li>
            <li @if($sort === 'type') class="is-active" @endif><a href="/vehicles/sort/type">Típus</a></li>
            <li @if($sort === 'daily_price') class="is-active" @endif><a href="/vehicles/">Napi díj</a></li>
            <li @if($sort === 'seats') class="is-active" @endif><a href="/vehicles/sort/seats">Férőhely</a ></li>
            <li @if($sort === 'is_available') class="is-active" @endif><a href="/vehicles/sort/is_available">Elérhető</a></li>
        </ul>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Név</th>
                <th>Típus</th>
                <th>Napi díj</th>
                <th>Férőhely</th>
                <th>Elérhető</th>
            </tr>
        </thead>
        <tbody>
            @forelse($vehicles as $vehicle)
                <tr>
                    <td>
                        <a href="{{ route('vehicles.show', ['id' => $vehicle->id]) }}">{{ $vehicle->name }}</a>
                    </td>
                    <td>{{ $vehicle->type }}</td>
                    <td>{{ $vehicle->daily_price }} $/nap</td>
                    <td>{{ $vehicle->seats }}</td>
                    <td>@if($vehicle->is_available) <span class="tag is-success">Igen</span> @else <span class="tag is-danger">Nem</span> @endif</td>
                </tr>
            @empty
                <td colspan="5">
                    <div class="notification">
                        Nincs megjeleníthető <jármű class=""></jármű>
                    </div>
                </td>
            @endforelse
        </tbody>
    </table>
@endsection
