<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function index() {
        $tools = Tool::orderBy('name')->get();

        return view('tools.index', ['tools' => $tools]);
    }

    public function show($id) {
        $tool = Tool::findOrFail($id);

        return view('tools.show', ['tool' => $tool]);
    }
}
