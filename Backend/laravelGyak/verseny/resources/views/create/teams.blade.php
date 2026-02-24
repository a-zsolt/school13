@extends('layouts.app')

@section('pageTitle', 'Feladatok - Új csapat létrehozása')

@section('content')
    <h1 class="display-5"><i class="bi bi-people-fill me-2 text-primary"></i>Új csapat létrehozása</h1>
    <form action="{{ route('store.team') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <label for="name" class="form-label">Csapat név</label>
                        <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @foreach($errors->get('name') as $error)
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
