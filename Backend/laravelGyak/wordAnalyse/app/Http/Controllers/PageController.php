<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        return view('pages.home');
    }

    public function about() {
        $app_name = config('app.name');
        $app_version = app()->version();

        $author = [
            "name" => "Andorko Zsolt"
        ];


        return view('pages.about', [
            'app_name' => $app_name,
            'app_version' => $app_version,
            'author' => $author
        ]);
    }
}
