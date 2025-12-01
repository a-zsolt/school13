<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contactController extends Controller
{
    public function show() {
        return view('pages.contact');
    }

    public function store(Request $request) {
        $name = $request->name;
        $email = $request->email;

        return view('pages.contactStore', [
            'name' => $name,
            'email' => $email
        ]);
    }
}
