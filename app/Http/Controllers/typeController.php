<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\technology;
use Illuminate\Http\Request;

use App\Models\type;


// controller che si riferisce ad i models type
class typeController extends Controller
{
    public function index()
    {
        $types = type::all();
        return view('pages.index', compact('types'));
    }
    public function create()
    {
        $types = type::all();
        $technologies = technology::all();
        return view('pages.create', compact('types', 'technologies'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $type = type::find($data['nome']);

        $project = new project();
        $project->nome_progetto = $data['nome_progetto'];
        $project->inizio_progetto = $data['inizio_progetto'];
        $project->descrizione = $data['descrizione'];
        $project->type()->associate($type);

        $project->save();

        $project->technologies()->attach($data['technology_id']);

        return redirect()->route('pages.index');
    }

    public function edit($id)
    {
        $project = project::find($id);
        $types = type::all();
        $technologies = technology::all();
        return view('pages.edit', compact('project', 'types', 'technologies'));
    }

    public function upgrade(Request $request, $id)
    {
        $data = $request->all();

        $type = type::find($data['nome']);

        $project = project::find($id);
        $project->nome_progetto = $data['nome_progetto'];
        $project->inizio_progetto = $data['inizio_progetto'];
        $project->descrizione = $data['descrizione'];
        $project->type()->associate($type);

        $project->save();

        $project->technologies()->sync($data['technology_id']);

        return redirect()->route('pages.index');
    }
}
