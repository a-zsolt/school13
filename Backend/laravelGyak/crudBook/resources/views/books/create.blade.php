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
                            <input type="text" class="form-control" name="title" id="title">
                        </div>

                        <div class="col-6">
                            <label for="author" class="form-label">Szerző</label>
                            <input type="text" class="form-control" name="author" id="author">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2">
                            <label for="id" class="form-label">Id</label>
                            <input type="number" class="form-control" name="id" id="id">
                        </div>

                        <div class="col-5">
                            <label for="published_year" class="form-label">Megjelenés éve</label>
                            <input type="number" class="form-control" name="published_year" id="published_year">
                        </div>

                        <div class="col-5">
                            <label for="price" class="form-label">Ár</label>
                            <input type="number" class="form-control" name="price" id="price">
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
