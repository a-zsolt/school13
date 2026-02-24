@extends('layouts.app')

@section('pageTitle', $team->name . ' - Csapat Részletek')

@section('content')
<div class="row mb-4 mt-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="display-5"><i class="bi bi-person-badge text-primary me-2"></i>{{ $team->name }}</h1>
            <p class="lead text-muted mb-0">Részletes csapat statisztikák, diákok és rögzített beadások.</p>
        </div>
        <a href="{{ route('dashboard.teams') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Vissza a csapatokhoz
        </a>
    </div>
</div>

@if($hasZeroPointSubmission)
<div class="alert alert-danger shadow-sm mb-4" role="alert">
    <i class="bi bi-exclamation-triangle-fill me-2"></i><strong>Figyelem!</strong> A csapatnak van 0 pontos beadása.
</div>
@endif

<div class="row gy-3 mb-4">
    <div class="col-md-4">
        <div class="card shadow-sm border-0 bg-primary text-white h-100">
            <div class="card-body text-center">
                <i class="bi bi-people-fill display-6 mb-2"></i>
                <h5 class="card-title">Diákok száma</h5>
                <h3 class="mb-0 fw-bold">{{ $team->students->count() }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm border-0 bg-success text-white h-100">
            <div class="card-body text-center">
                <i class="bi bi-trophy-fill display-6 mb-2"></i>
                <h5 class="card-title">Összpontszám</h5>
                <h3 class="mb-0 fw-bold">{{ $team->submissions_sum_points ?? 0 }} p</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm border-0 bg-info text-white h-100">
            <div class="card-body text-center">
                <i class="bi bi-graph-up display-6 mb-2"></i>
                <h5 class="card-title">Átlagpont</h5>
                <h3 class="mb-0 fw-bold">{{ number_format($team->submissions_avg_points ?? 0, 2, ',', ' ') }} p</h3>
            </div>
        </div>
    </div>
</div>

<div class="row gy-4 mb-5">
    <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white border-bottom">
                <h5 class="card-title mb-0 py-2"><i class="bi bi-person-lines-fill me-2 text-primary"></i>Csapattagok</h5>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @forelse($team->students as $student)
                        <li class="list-group-item d-flex align-items-center">
                            <i class="bi bi-person-fill text-muted me-2"></i>
                            {{ $student->name }}
                        </li>
                    @empty
                        <li class="list-group-item text-center text-muted py-3">Nincsenek rögzített csapattagok.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 py-2"><i class="bi bi-journal-check me-2 text-success"></i>Beadások</h5>
                <span class="badge bg-secondary rounded-pill">{{ $team->submissions->count() }} db</span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Feladat</th>
                                <th class="text-end">Pontszám</th>
                                <th class="text-end">Beküldve</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($team->submissions as $submission)
                                <tr>
                                    <td><strong>{{ $submission->challange->title }}</strong></td>
                                    <td class="text-end">
                                        <span class="badge {{ $submission->points == 0 ? 'bg-danger' : 'bg-success' }} rounded-pill px-3">{{ $submission->points }} p</span>
                                    </td>
                                    <td class="text-end text-muted small">{{ $submission->created_at ? $submission->created_at->format('Y-m-d H:i') : '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-muted">A csapat még nem küldött be feladatot.</td>
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
