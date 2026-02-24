@extends('layouts.app')

@section('pageTitle', 'Verseny Dashboard')

@section('content')
<div class="row mb-4 mt-4">
    <div class="col-12">
        <h1 class="display-5"><i class="bi bi-speedometer2 me-2 text-primary"></i>Dashboard</h1>
        <p class="lead text-muted">Gyors áttekintés a verseny állásáról és a legutóbbi eseményekről.</p>
    </div>
</div>

<div class="row gy-4">
    <div class="col-md-6">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0"><i class="bi bi-trophy-fill me-2"></i>Top 2 Csapat</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Helyezés</th>
                                <th>Csapat</th>
                                <th class="text-end">Összpont</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($topTeams as $index => $team)
                                <tr>
                                    <td>#{{ $index + 1 }}</td>
                                    <td><strong>{{ $team->name }}</strong></td>
                                    <td class="text-end fw-bold">{{ $team->submissions_sum_points ?? 0 }} p</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-3">Nincsenek még csapatok vagy beadások.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-header bg-success text-white">
                <h5 class="card-title mb-0"><i class="bi bi-star-fill me-2 text-warning"></i>Rekord Beadás</h5>
            </div>
            <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                @if($topSubmission)
                    <div class="display-4 text-success fw-bold mb-2">{{ $topSubmission->points }} p</div>
                    <h4 class="mb-1">{{ $topSubmission->team->name }}</h4>
                    <p class="text-muted mb-0"><i class="bi bi-journal-code me-1"></i> Feladat: {{ $topSubmission->challange->title }}</p>
                @else
                    <p class="text-muted mb-0">Még nem érkezett beadás.</p>
                @endif
            </div>
        </div>
    </div>

    <div class="col-12 mt-2">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-info text-white">
                <h5 class="card-title mb-0"><i class="bi bi-clock-history me-2"></i>Legutóbbi 3 Beadás</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Sorrend</th>
                                <th>Csapat</th>
                                <th>Feladat</th>
                                <th class="text-end">Pontszám</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latestSubmissions as $index => $submission)
                                <tr>
                                    <td>{{ $index + 1 }}.</td>
                                    <td><strong>{{ $submission->team->name }}</strong></td>
                                    <td>{{ $submission->challange->title }}</td>
                                    <td class="text-end"><span class="badge bg-secondary rounded-pill py-2 px-3">{{ $submission->points }} p</span></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">Nincsenek még beadások.</td>
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
