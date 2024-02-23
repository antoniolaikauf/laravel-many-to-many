<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\project;

// controller che si riferisce ad i models project
class projectController extends Controller
{
    public function index()
    {
        $projects = project::all();
        return view('pages.projects', compact('projects'));
    }
}
