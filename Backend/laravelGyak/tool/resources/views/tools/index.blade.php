@extends('layouts.app')

@section('page_title', 'Bérelhető Szerszám - Főoldal')

@section('content')
    <h5>Bérelhető szerszámok</h5>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Név</th>
            <th scope="col">Kategória</th>
            <th scope="col">Napi díj (Ft/nap)</th>
            <th scope="col">Elérhető</th>
        </tr>
        </thead>
        <tbody>
        @forelse($tools as $tool)
            <tr>
                <td>
                    <a href="{{ route('tools.show', ['id' => $tool->id]) }}">{{ $tool->name }}</a>
                </td>
                <td>{{ $tool->category }}</td>
                <td>{{ $tool->daily_price }}</td>
                <td>
                    @if($tool->is_available)
                        <span class="badge text-bg-success">igen</span>
                    @else
                        <span class="badge text-bg-danger">nem</span>
                    @endif
                </td>
            </tr>
        @empty
            <div class="alert alert-danger" role="alert">
                Nincs megjeleníthető szerszám!
            </div>
        @endforelse
        </tbody>
    </table>
@endsection
