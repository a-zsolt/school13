@extends('layouts.app')

@section('pageTitle', 'Feladatok - Új feladat létrehozása')

@section('content')
    <h1 class="display-5"><i class="bi bi-list-task me-2 text-primary"></i>Új Feladat létrehozása</h1>
    <form action="{{ route('store.challenge') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <label for="title" class="form-label">Feladat cím</label>
                        <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                        @foreach($errors->get('title') as $error)
                            <div class="invalid-feedback">
                                {{ $error }}
                            </div>
                        @endforeach
                    </div>
                    <div class="col-5">
                        <label for="max_points" class="form-label">Max pontszám</label>
                        <input id="max_points" name="max_points" type="text" class="form-control @error('max_points') is-invalid @enderror" value="{{ old('max_points') }}">
                        @foreach($errors->get('max_points') as $error)
                            <div class="invalid-feedback">
                                {{ $error }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3 d-flex justify-content-center gap-2">
            <a class="btn btn-outline-secondary" href="{{ route('dashboard.teams') }}"><i class="bi bi-arrow-left"></i> Mégse</a>
            <button class="btn btn-primary" type="submit"><i class="bi bi-file-earmark-plus"></i> Létrehozás</button>
        </div>
    </form>
@endsection
