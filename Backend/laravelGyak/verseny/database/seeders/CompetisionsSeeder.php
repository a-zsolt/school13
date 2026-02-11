<?php

namespace Database\Seeders;

use App\Models\Challange;
use App\Models\Student;
use App\Models\Submission;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompetisionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //TEAMS
        $t1 = Team::create(['name' => 'Kék Cápák']);
        $t2 = Team::create(['name' => 'Piros Rókák']);
        $t3 = Team::create(['name' => 'Zöld Teknősök']);

        //STUDENTS

        //KékCápák
        Student::create(['name' => 'Nagy Anna' ,'team_id' => $t1->id]);
        Student::create(['name' => 'Kiss Bence' ,'team_id' => $t1->id]);
        Student::create(['name' => 'Kovács Dániel' ,'team_id' => $t1->id]);

        //PirosRókák
        Student::create(['name' => 'Szabó Eszter' ,'team_id' => $t2->id]);
        Student::create(['name' => 'Fekete Levente' ,'team_id' => $t2->id]);

        //ZöldTeknősök
        Student::create(['name' => 'Horváth Luca' ,'team_id' => $t3->id]);
        Student::create(['name' => 'Kocsis Máté' ,'team_id' => $t3->id]);

        //CHALLENGES
        $ch1 = Challange::create(['title' => 'ORM kapcsolatok alapjai', 'max_points' => 10]);
        $ch2 = Challange::create(['title' => 'Eloquent lekérdezések', 'max_points' => 15]);
        $ch3 = Challange::create(['title' => 'ScoreBoard statisztika számtás', 'max_points' => 20]);

        //SUBMISSIONS

        //KC
        Submission::create(['team_id' => $t1->id, 'challenge_id' => $ch1->id, 'points' => 8]);
        Submission::create(['team_id' => $t1->id, 'challenge_id' => $ch2->id, 'points' => 12]);

        //PR
        Submission::create(['team_id' => $t2->id, 'challenge_id' => $ch1->id, 'points' => 10]);
        Submission::create(['team_id' => $t2->id, 'challenge_id' => $ch3->id, 'points' => 18]);

        //ZT
        Submission::create(['team_id' => $t3->id, 'challenge_id' => $ch2->id, 'points' => 9]);
    }
}
