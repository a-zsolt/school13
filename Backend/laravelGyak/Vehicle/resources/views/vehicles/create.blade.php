@extends('layouts.app')

@section('content')
    <form action="{{ route('vehicles.store') }}" method="POST">
        @csrf
        <div class="card mb-5">
            <div class="card-content">
                <div class="field-body">
                    <div class="field">
                        <label class="label">Megnevezés</label>
                        <div class="control">
                            <input class="input" type="text" placeholder="" name="name">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Típus</label>
                        <div class="select">
                            <select name="type">
                                @foreach($types ?? [] as $type)
                                    <option>{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Rendszámtábla</label>
                        <div class="control">
                            <input class="input" type="text" placeholder="" name="licence_plate">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Férőhely</label>
                        <div class="control">
                            <input class="input" type="number" placeholder="" name="seats">
                        </div>
                    </div>
                </div>

                <div class="field-body">
                    <div class="field">
                        <label class="label">Napi díj</label>
                        <div class="control">
                            <input class="input" type="number" placeholder="" name="daily_price">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Kaució</label>
                        <div class="control">
                            <input class="input" type="number" placeholder="" name="deposit">
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Leírás</label>
                    <div class="control">
                        <textarea name="description" class="textarea"></textarea>
                    </div>
                </div>

            </div>
        </div>

        <div class="field is-grouped is-grouped-centered mt-5">
            <div class="control">
                <button type="submit" class="button is-link">Submit</button>
            </div>
        </div>
    </form>
@endsection
