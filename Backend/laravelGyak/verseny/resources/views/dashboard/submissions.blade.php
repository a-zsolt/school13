@extends('layouts.app')

@section('pageTitle', 'Beadások - Verseny Dashboard')

@section('content')
<div class="mb-4 mt-4 hstack justify-content-between">
    <div >
        <h1 class="display-5"><i class="bi bi-file-earmark-code me-2 text-primary"></i>Beadások Listája & Mátrix</h1>
        <p class="lead text-muted">Az összes beadás optimalizált listája és a Csapat-Feladat mátrix nézet.</p>
    </div>
    <div>
        <a href="{{route('create.submission')}}" class="btn btn-primary"><i class="bi bi-file-earmark-plus"></i> Új beadás</a>
    </div>
</div>

<div class="row gy-4 mb-5">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 py-2"><i class="bi bi-list-columns-reverse me-2 text-info"></i>Beadások</h5>
                <div class="hstack gap-1">
                    <form method="GET" action="{{ route('dashboard.submissions') }}" class="m-0 p-0 d-flex gap-1" id="filterForm">
                        <div class="input-group input-group-sm">
                            <label class="input-group-text" for="teamFilter">csapat</label>
                            <select class="form-select" id="teamFilter" name="team_id" onchange="document.getElementById('filterForm').submit()">
                                <option value="all" {{ request('team_id') == 'all' ? 'selected' : '' }}>összes</option>
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}" {{ request('team_id') == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group input-group-sm">
                            <label class="input-group-text" for="submissionFilter">feladat</label>
                            <select class="form-select" id="submissionFilter" name="challenge_id" onchange="document.getElementById('filterForm').submit()">
                                <option value="all" {{ request('challenge_id') == 'all' ? 'selected' : '' }}>összes</option>
                                @foreach($tasks as $task)
                                    <option value="{{ $task->id }}" {{ request('challenge_id') == $task->id ? 'selected' : '' }}>{{ $task->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <span class="badge bg-primary rounded-pill pb-1">{{ $submissions->count() }} beadás</span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light sticky-top">
                            <tr>
                                <th>ID</th>
                                <th>Csapat</th>
                                <th>Feladat</th>
                                <th class="text-end">Pont</th>
                                <th class="text-end">Beküldve</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($submissions as $sub)
                                <tr>
                                    <td class="text-muted">#{{ $sub->id }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.team', $sub->team->id) }}" class="text-decoration-none fw-bold">
                                            {{ $sub->team->name }}
                                        </a>
                                    </td>
                                    <td>{{ $sub->challange->title }}</td>
                                    <td class="text-end fw-bold text-success">{{ $sub->points }} p</td>
                                    <td class="text-end text-muted small">{{ $sub->created_at ? $sub->created_at->format('Y-m-d H:i') : '-' }}</td>
                                    <td class="text-end">
                                        <form  method="POST" action="{{ route('delete.submission', ['submission' => $sub->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">X</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">Még nincs feltöltve beadás.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-bottom">
                <h5 class="card-title mb-0 py-2"><i class="bi bi-grid-3x3 me-2 text-warning"></i>Csapat-Feladat</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                    <table class="table table-bordered table-hover align-middle mb-0">
                        <thead class="table-light sticky-top">
                            <tr>
                                <th>Csapat</th>
                                <th>Feladat</th>
                                <th class="text-center">Elért Pont</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($matrixSubmissions as $sub)
                                <tr>
                                    <td>
                                        <a href="{{ route('dashboard.team', $sub->team->id) }}" class="text-decoration-none fw-bold text-dark">
                                            {{ $sub->team->name }}
                                        </a>
                                    </td>
                                    <td>{{ $sub->challange->title }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-dark rounded-pill">{{ $sub->points }} p</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-muted">Még nincs mátrix adat.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
