@extends('layouts.app')

@section('pageTitle', 'Feladatok - Verseny Dashboard')

@section('content')
<div class="mb-4 mt-4 hstack justify-content-between">
    <div>
        <h1 class="display-5"><i class="bi bi-journal-check me-2 text-primary"></i>Feladatok Statisztikája</h1>
        <p class="lead text-muted">A versenyfeladatok teljesítményének és beadásainak áttekintése.</p>
    </div>
    <div>
        <a href="{{ route('create.challenge') }}" class="btn btn-primary"><i class="bi bi-file-earmark-plus"></i> Új feladat</a>
    </div>
</div>

<div class="row gy-4">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white border-bottom">
                <h5 class="card-title mb-0 py-2"><i class="bi bi-list-task me-2 text-success"></i>Összes Feladat</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Feladat Cím</th>
                                <th class="text-center">Max pont</th>
                                <th class="text-center">Beadások száma</th>
                                <th class="text-center">Átlagpont</th>
                                <th class="text-center">Max pontos beadás?</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($challenges as $challenge)
                                <tr>
                                    <td><strong>{{ $challenge->title }}</strong></td>
                                    <td class="text-center">{{ $challenge->max_points }} p</td>
                                    <td class="text-center">
                                        <span class="badge bg-secondary rounded-pill">{{ $challenge->submissions_count }}</span>
                                    </td>
                                    <td class="text-center">
                                        {{ number_format($challenge->submissions_avg_points ?? 0, 2, ',', ' ') }} p
                                    </td>
                                    <td class="text-center">
                                        @if(in_array($challenge->id, $maxPointChallengeIds))
                                            <span class="badge bg-success"><i class="bi bi-check-circle-fill me-1"></i> Igen</span>
                                        @else
                                            <span class="badge bg-danger"><i class="bi bi-x-circle-fill me-1"></i> Nem</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">Nincsenek még feladatok.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-warning text-dark border-bottom">
                <h5 class="card-title mb-0 py-2"><i class="bi bi-exclamation-triangle-fill me-2"></i>Még nincs beadás</h5>
            </div>
            <div class="card-body p-0 d-flex flex-column">
                @if($challengesWithoutSubmissions->isEmpty())
                    <div class="p-4 text-center text-muted m-auto">
                        <i class="bi bi-check-all fs-1 text-success mb-2"></i>
                        <p class="mb-0">Minden feladatra érkezett már beadás!</p>
                    </div>
                @else
                    <ul class="list-group list-group-flush">
                        @foreach($challengesWithoutSubmissions as $emptyChallenge)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $emptyChallenge->title }}
                                <span class="badge bg-dark rounded-pill">{{ $emptyChallenge->max_points }} p</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
