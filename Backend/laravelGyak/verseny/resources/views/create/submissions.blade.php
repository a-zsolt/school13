@extends('layouts.app')

@section('pageTitle', 'Feladatok - Új beadás létrehozása')

@section('content')
    <h1 class="display-5"><i class="bi bi-file-earmark-code me-2 text-primary"></i>Új Beadás</h1>
    <form action="{{ route('store.submission') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <label for="team" class="form-label">Csapat</label>
                        <select id="team_id" name="team_id" class="form-select @error('team_id') is-invalid @enderror">
                            @foreach($teams as $team)
                                <option
                                    value="{{$team->id}}" {{ old('team_id') == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                            @endforeach
                        </select>
                        @foreach($errors->get('team_id') as $error)
                            <div class="invalid-feedback">
                                {{ $error }}
                            </div>
                        @endforeach
                    </div>
                    <div class="col-5">
                        <label for="challange" class="form-label">Feladat</label>
                        <select id="challange_id" name="challange_id"
                                class="form-select @error('challange_id') is-invalid @enderror">
                            @foreach($challanges as $challange)
                                <option
                                    value="{{$challange->id}}" {{ old('challange_id') == $challange->id ? 'selected' : '' }}>{{ $challange->title }}</option>
                            @endforeach
                        </select>
                        @foreach($errors->get('challange_id') as $error)
                            <div class="invalid-feedback">
                                {{ $error }}
                            </div>
                        @endforeach
                    </div>
                    <div class="col-2">
                        <label for="points" class="form-label">Elért pontok</label>
                        <input id="points" name="points" type="number"
                               class="form-control @error('points') is-invalid @enderror" value="{{ old('points') }}">
                        @foreach($errors->get('points') as $error)
                            <div class="invalid-feedback">
                                {{ $error }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3 d-flex justify-content-center gap-2">
            <a class="btn btn-outline-secondary" href="{{ route('dashboard.submissions') }}"><i
                    class="bi bi-arrow-left"></i> Mégse</a>
            <button class="btn btn-primary" type="submit"><i class="bi bi-file-earmark-plus"></i> Létrehozás</button>
        </div>
    </form>
@endsection
