<?php

namespace App\Http\Controllers;

use App\Models\Challange;
use App\Models\Submission;
use App\Models\Team;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index() {
        $topTeams = Team::withCount('submissions')
            ->withSum('submissions', 'points')
            ->orderByDesc('submissions_sum_points')
            ->take(2)
            ->get();

        $topSubmission = Submission::with(['team', 'challange'])
            ->orderByDesc('points')
            ->first();

        $latestSubmissions = Submission::with(['team', 'challange'])
            ->latest()
            ->take(3)
            ->get();

        return view('dashboard.index', compact('topTeams', 'topSubmission', 'latestSubmissions'));
    }

    public function teams() {
        $teams = Team::withCount(['students', 'submissions'])
            ->withSum('submissions', 'points')
            ->withAvg('submissions', 'points')
            ->orderBy('name', 'asc')
            ->get();

        return view('dashboard.teams', compact('teams'));
    }

    public function challenges() {
        $challenges = Challange::withCount('submissions')
            ->withAvg('submissions', 'points')
            ->get();

        $challengesWithoutSubmissions = Challange::doesntHave('submissions')->get();

        $maxPointChallengeIds = Challange::whereHas('submissions', function ($q) {
            $q->whereColumn('submissions.points', 'challanges.max_points');
        })->pluck('id')->toArray();

        return view('dashboard.challenges', compact('challenges', 'challengesWithoutSubmissions', 'maxPointChallengeIds'));
    }

    public function submissions(Request $request) {
        $teams = Team::all();
        $tasks = Challange::all();
        
        $query = Submission::with(['team', 'challange']);
        
        if ($request->filled('team_id') && $request->team_id !== 'all') {
            $query->where('team_id', $request->team_id);
        }
        
        if ($request->filled('challenge_id') && $request->challenge_id !== 'all') {
            $query->where('challange_id', $request->challenge_id);
        }

        $submissions = $query->get();

        $matrixSubmissions = $submissions->sortBy([
            ['team.name', 'asc'],
            ['challange.title', 'asc'],
        ]);

        return view('dashboard.submissions', compact('submissions', 'matrixSubmissions', 'teams', 'tasks'));
    }

    public function team($id) {
        $team = Team::with(['students', 'submissions.challange'])
            ->withSum('submissions', 'points')
            ->withAvg('submissions', 'points')
            ->findOrFail($id);

        $hasZeroPointSubmission = $team->submissions->contains('points', 0);

        return view('dashboard.team', compact('team', 'hasZeroPointSubmission'));
    }
}
