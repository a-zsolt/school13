@extends('layouts.app')

@section('title', $vehicle->name . ' részletei')

@section('content')
    <form action="{{ route('vehicle.update', ['id' => $vehicle->id]) }}">
        <div class="card mb-5">
            <div class="card-content">
                <div class="level">
                    <div class="level-left">
                        <div>
                            <input class="title is-3 input" type="text" name="name" value="{{ $vehicle->name }}">
                            <p class="subtitle is-5 has-text-grey">
                                <span class="icon is-small"><i class="fas fa-car"></i></span>
                                Rendszám: <input class="input" type="text" name="licence_plate" value="{{ $vehicle->licence_plate }}">
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
                            <input type="number" class="input is-size-5" name="daily_price" value="{{ $vehicle->daily_price }}"/> $/nap
                        </p>
                        <p>
                            <strong>Kaució:</strong> <br>
                            <input type="number" class="input is-size-5" name="deposit" value="{{ $vehicle->deposit }}"/> $
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
                            <div class="select">
                                <select name="type">
                                    @foreach($types ?? [] as $type)
                                        <option>{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </p>
                        <p>
                            <strong>Férőhely:</strong> <br>
                            <input type="number" class="input is-size-5" name="seats" value="{{ $vehicle->seats }}"/>
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
                                <textarea class="textarea" name="description">{{ $vehicle->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="field is-grouped is-grouped-centered mt-5">
            <p class="control">
                <a href="{{ route('vehicles.show', ['id' => $vehicle->id]) }}" class="button is-light">
                    &larr; Mégse
                </a>
            </p>
            <button type="submit" class="button is-primary">Mentés</button>

        </div>
    </form>
@endsection
