<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class helloController extends Controller
{
    public function index() {
        return view('hello', [
            'name' => 'zsolt'
        ]);
    }

    public function hi($name) {
        return view('hello', [
            'name' => $name
        ]);
    }
}
