<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChallengeRequest;
use App\Http\Requests\StoreSubssionRequest;
use App\Http\Requests\StoreTeamRequest;
use App\Models\Challange;
use App\Models\Submission;
use App\Models\Team;
use Illuminate\Http\Request;

class Create extends Controller
{
    //SUBMISSIONS
    public function submission () {
        $teams = Team::all();
        $challenge = Challange::all();

        return view('create.submissions', ['teams' => $teams, 'challanges' => $challenge]);
    }

    public function storeSubmission (StoreSubssionRequest $request) {
        Submission::create($request->validated());

        return redirect()->route('dashboard.submissions');
    }

    public function deleteSubmission($submission)
    {
        $selected_submission = Submission::findOrFail($submission);
        $selected_submission->delete();
        return redirect()->route('dashboard.submissions');
    }

    //TEAMS
    public function team()
    {
        return view('create.teams');
    }

    public function storeTeam(StoreTeamRequest $request) {
        Team::create($request->validated());

        return redirect()->route('dashboard.teams');
    }

    //CHALLENGES
    public function challenge()
    {
        return view('create.challenges');
    }

    public function storeChallenge(StoreChallengeRequest $request)
    {
        Challange::create($request->validated());

        return redirect()->route('dashboard.challenges');
    }
}
