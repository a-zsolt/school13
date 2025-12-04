@extends('layouts.app')

@section('page_title', 'WordAnalyser - Részletek')

@section('content')
    <div class="card">
        <footer class="card-footer">
            <p class="card-footer-item">Alkalmazás neve: {{ $app_name }}</p>
            <p class="card-footer-item">Laravel verzió: {{ $app_version }}</p>
            <p class="card-footer-item">Készítő: {{ $author['name'] }}</p>
        </footer>
    </div>
@endsection
