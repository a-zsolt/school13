@extends('layouts.app')

@section('pageTitle', 'Csapatok - Verseny Dashboard')

@section('content')
<div class="mb-4 mt-4 hstack justify-content-between">
    <div>
        <h1 class="display-5"><i class="bi bi-people-fill me-2 text-primary"></i>Csapatok Statisztikája</h1>
        <p class="lead text-muted">A versenyen résztvevő csapatok átfogó statisztikája és teljesítménye.</p>
    </div>
    <div>
        <a href="{{route('create.team')}}" class="btn btn-primary"><i class="bi bi-file-earmark-plus"></i> Új csapat</a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-bottom">
                <h5 class="card-title mb-0 py-2"><i class="bi bi-bar-chart-fill me-2 text-success"></i>Scoreboard & Áttekintés</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Csapatnév</th>
                                <th class="text-center">Diákok száma</th>
                                <th class="text-center">Beadások száma</th>
                                <th class="text-center">Átlagpont</th>
                                <th class="text-end">Összpont</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($teams as $team)
                                <tr>
                                    <td>
                                        <a href="{{ route('dashboard.team', $team->id) }}" class="text-decoration-none fw-bold">
                                            {{ $team->name }}
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-secondary rounded-pill">{{ $team->students_count }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-info rounded-pill">{{ $team->submissions_count }}</span>
                                    </td>
                                    <td class="text-center">
                                        {{ number_format($team->submissions_avg_points ?? 0, 2, ',', ' ') }} p
                                    </td>
                                    <td class="text-end text-success fw-bold">
                                        {{ $team->submissions_sum_points ?? 0 }} p
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">Nincsenek megjeleníthető csapatok.</td>
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
