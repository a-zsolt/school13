@extends('layouts.app')

@section('page_title', 'LaraHello - Contact')

@section('content')
    <h1>Contact</h1>

<form method="post" action="/contact">
    @csrf
    <label class="form-label">
        Név:
        <input class="form-control" type="text" name="name" required>
    </label>

    <label class="form-label">
        Email:
        <input class="form-control" type="email" name="email" required>
    </label>

    <input class="btn btn-primary" type="submit" value="Beküldés">
</form>

@endsection
