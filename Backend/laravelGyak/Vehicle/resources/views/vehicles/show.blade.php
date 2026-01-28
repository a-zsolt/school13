@extends('layouts.app')

@section('title', $vehicle->name . ' részletei')

@section('content')
    <div class="card mb-5">
        <div class="card-content">
            <div class="level">
                <div class="level-left">
                    <div>
                        <p class="title is-3">{{ $vehicle->name }}</p>
                        <p class="subtitle is-5 has-text-grey">
                            <span class="icon is-small"><i class="fas fa-car"></i></span>
                            Rendszám: <strong>{{ $vehicle->licence_plate }}</strong>
                        </p>
                    </div>
                </div>
                <div class="level-right">
                    @if($vehicle->is_available)
                        <span class="tag is-success is-large">Elérhető</span>
                    @else
                        <span class="tag is-danger is-large">Jelenleg nem elérhető</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="columns is-variable is-6">
        <div class="column is-half">
            <div class="box h-100">
                <h4 class="title is-4 has-text-primary">Pénzügyi adatok</h4>
                <div class="content">
                    <p>
                        <strong>Napi díj:</strong> <br>
                        <span class="is-size-5">{{ number_format($vehicle->daily_price, 0, ',', ' ') }} $/nap</span>
                    </p>
                    <p>
                        <strong>Kaució:</strong> <br>
                        @if($vehicle->deposit)
                            <span class="is-size-5">{{ number_format($vehicle->deposit, 0, ',', ' ') }} $</span>
                        @else
                            <span class="has-text-grey-light is-italic">Nincs megadva</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <div class="column is-half">
            <div class="box h-100">
                <h4 class="title is-4 has-text-info">Műszaki adatok</h4>
                <div class="content">
                    <p>
                        <strong>Típus:</strong> <br>
                        <span class="is-capitalized">{{ $vehicle->type }}</span>
                    </p>
                    <p>
                        <strong>Férőhely:</strong> <br>
                        @if($vehicle->seats)
                            {{ $vehicle->seats }} fő
                        @else
                            <span class="has-text-grey-light is-italic">Nincs megadva</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="columns">
        <div class="column is-full">
            <div class="box">
                <div class="columns">
                    <div class="column is-one-third">
                        <h5 class="title is-5">Bérlési feltételek</h5>
                        <ul class="content">
                            <li>Átvételkor személyi igazolvány szükséges</li>
                            <li>Minimum bérlés: 1 nap</li>
                            <li>Üzemanyag nem része az árnak</li>
                            <li>Dohányzás tilos az autóban</li>
                        </ul>
                    </div>

                    <div class="column is-two-thirds">
                        <h5 class="title is-5">Leírás</h5>
                        <div class="content has-background-dark p-4" style="border-radius: 4px;">
                            @if($vehicle->description)
                                {{ $vehicle->description }}
                            @else
                                <span class="has-text-grey-light is-italic">Nincs leírás</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="field is-grouped is-grouped-centered mt-5">
        <p class="control">
            <a href="{{ route('vehicles.index') }}" class="button is-light">
                &larr; Vissza a listához
            </a>
        </p>
        <a class="button is-primary" href="{{ route('vehicle.edit', ['id' => $vehicle->id]) }}">Szerkesztés</a>
        <form method="POST" action="{{ route('vehicle.destroy', ['id' => $vehicle->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="button is-danger">Törlés</button>
        </form>
    </div>
@endsection
