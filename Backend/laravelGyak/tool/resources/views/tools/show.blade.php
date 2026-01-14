@extends('layouts.app')

@section('page_title', 'Bérelhető Szerszám - Szerszám')

@section('content')
    <section class="d-flex">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $tool->name }}</h5>
                <p class="card-text">@if($tool->description) {{ $tool->description }} @else nincs leírás @endif</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Kategória: {{ $tool->category }}</li>
                <li class="list-group-item">Napi díj: {{ $tool->daily_price }}Ft/nap</li>
                <li class="list-group-item">Kaució: @if($tool->deposit)
                        {{ $tool->deposit }} Ft
                    @else
                        nincs megadva
                    @endif</li>
                <li class="list-group-item">Gyártiszám: @if($tool->serial_number)
                        {{ $tool->serial_number }}
                    @else
                        nincs megadva
                    @endif</li>
                <li class="list-group-item">Elérhető: @if($tool->is_available)
                        <span class="badge text-bg-success">igen</span>
                    @else
                        <span class="badge text-bg-danger">nem</span>
                    @endif</li>
            </ul>
            <div class="card-body">
                <a href="{{ route('tools.index') }}" class="card-link">Vissza a listához</a>
            </div>
        </div>
    </section>
@endsection
