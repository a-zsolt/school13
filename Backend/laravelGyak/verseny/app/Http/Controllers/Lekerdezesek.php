<?php

namespace App\Http\Controllers;

use App\Models\Challange;
use App\Models\Submission;
use App\Models\Team;
use Illuminate\Http\Request;
use function Illuminate\Events\queueable;

class Lekerdezesek extends Controller
{
    public function lekerdezesek() {

        //1.
        Team::all()->sortBy('name');

        //2.
        Team::withCount('students')->get();

        //3.
        Team::has('students', '>=', 3)->get();

        //4.
        Team::withCount('submissions')->get();

        //5.
        Team::withCount('submissions')->withSum('submissions', 'points')->get()->map(function ($team) {
            return [
                'Team Name' => $team->name,
                'Submissions' => $team->submissions_count,
                'Total Points' => $team->submissions_sum_points ?? 0
            ];
        });

        //6.
        Team::withCount('submissions')->withSum('submissions', 'points')->orderByDesc('submissions_sum_points')->take(2)->get()->map(function ($team) {
            return [
                'Team Name' => $team->name,
                'Submissions' => $team->submissions_count,
                'Total Points' => $team->submissions_sum_points ?? 0
            ];
        });

        //7.
        Challange::withCount('submissions')->get();

        //8.
        Challange::doesntHave('submissions')->get();

        //9.
        Submission::with(['team', 'challange'])->orderByDesc('points')->take(1)->get()->map(function ($submission) {
            return [
                'Team Name' => $submission->team->name,
                'Challenge Name' => $submission->challange->title,
                'points' => $submission->points,
            ];
        });

        //10.
        Submission::with(['team', 'challange'])->whereHas('team', function ($query) {
            $query->where('name', 'like', '%Kék Cápák%');
        })->get()->map(function ($submission) {
            return [
              'Challenge Name' => $submission->challange->title,
              'points' => $submission->points,
            ];
        });

        //11.
        Team::whereHas('submissions.challange', function ($query) {
            $query->where('title', 'like', '%ORM kapcsolatok alapjai%');
        })->pluck('name');

        //12.
        Team::whereDoesntHave('submissions.challange', function ($query) {
            $query->where('title', 'like', '%ORM kapcsolatok alapjai%');
        })->pluck('name');

        //13.
        Challange::withAvg('submissions', 'points')->get();

        //14.
        Team::withAvg('submissions', 'points')->get();

        //15.
        Team::whereHas('submissions', function ($query) {
           $query->where('points', '=', 0);
        })->pluck('name');

        //16.
        Challange::whereHas('submissions', function ($q) {
            $q->whereColumn('submissions.points', 'challenges.max_points');
        })->pluck('title');

        //17.
        Submission::with(['team', 'challange'])->get()->sortBy(
            [
                ['team.name', 'asc'],
                ['challange.title', 'asc'],
            ])->map(function ($submission) {
            return [
                'Team Name' => $submission->team->name,
                'Challenge Title' => $submission->challange->title,
                'Points' => $submission->points,
            ];
        });

        //18.
        Submission::with(['team', 'challange'])->latest()->take(3)->get()->map(function ($submission)
        {
            return [
                'Team Name' => $submission->team->name,
                'Challenge Title' => $submission->challange->title,
                'Points' => $submission->points,
            ];
        });

        //19.
        Team::with(['students', 'submissions.challange'])->find(1);

        //20.
        Submission::with(['team', 'challange'])->get();
    }
}
