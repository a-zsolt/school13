@extends('layouts.app')

@section('pageTitle', 'Új Könyv Hozzáadása')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-body">
                <h2>Új könyv létrehozása</h2>
                <form class="vstack gap-2" method="POST" action="{{ route('books.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="title" class="form-label">Könyv Címe</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}">
                            @foreach($errors->get('title') as $error)
                                <div class="invalid-feedback">
                                    {{ $error }}
                                </div>
                            @endforeach
                        </div>

                        <div class="col-6">
                            <label for="author" class="form-label">Szerző</label>
                            <input type="text" class="form-control @error('author') is-invalid @enderror" value="{{ old('author') }}" name="author" id="author">
                            @foreach($errors->get('author') as $error)
                                <div class="invalid-feedback">
                                    {{ $error }}
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-5">
                            <label for="published_year" class="form-label">Megjelenés éve</label>
                            <input type="number" class="form-control @error('published_year') is-invalid @enderror" value="{{ old('published_year') }}" name="published_year" id="published_year">
                            @foreach($errors->get('published_year') as $error)
                                <div class="invalid-feedback">
                                    {{ $error }}
                                </div>
                            @endforeach
                        </div>

                        <div class="col-5">
                            <label for="price" class="form-label">Ár</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" name="price" id="price">
                            @foreach($errors->get('price') as $error)
                                <div class="invalid-feedback">
                                    {{ $error }}
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Létrehozás</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
