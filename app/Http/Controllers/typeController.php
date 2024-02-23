<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\technology;
use Illuminate\Http\Request;

use App\Models\type;

use App\Http\Requests\projecteFormRequests;


// controller che si riferisce ad i models type
class typeController extends Controller
{
    public function index()
    {
        $types = type::all();
        return view('pages.index', compact('types'));
    }
    // metodo create che permette di passare ad un altra pagina 
    // si passano dentro i models che si vuole usare 
    public function create()
    {
        $types = type::all();
        $technologies = technology::all();
        return view('pages.create', compact('types', 'technologies'));
    }
    // metodo store prende i dati nella pagina create e li mette nel database 
    public function store(projecteFormRequests $request)
    {
        // qua prende tutti i dati nel form 
        $data = $request->all();
        // qua essendo che bisogna associare un type per il progetto si è usato una select essendo che un progetto avra un type 
        // e quindi con find si trova il type che c'è nell valore nome che si trova nella select
        $type = type::find($data['nome']);
        // qua si crea un nuovo componente
        $project = new project();
        $project->nome_progetto = $data['nome_progetto'];
        $project->inizio_progetto = $data['inizio_progetto'];
        $project->descrizione = $data['descrizione'];
        // qua si associa il type
        $project->type()->associate($type);

        $project->save();
        // qua si prende i tipi di tecnologia essendo che possono essere di piu si usa una checkbox e ritorna un array chiamato technology_id
        $project->technologies()->attach($data['technology_id']);

        return redirect()->route('pages.index');
    }

    public function edit($id)
    {
        // prima bisogna vedere quale progetto si ha cliccato con find 
        // dopo si ritornano i model type e technology cosi si possono far scegliere essendo che sono piu valori 
        $project = project::find($id);
        $types = type::all();
        $technologies = technology::all();
        return view('pages.edit', compact('project', 'types', 'technologies'));
    }

    public function upgrade(projecteFormRequests $request, $id)
    {
        // qua prende tutti i dati nel form 
        $data = $request->all();
        // qua essendo che bisogna associare un type per il progetto si è usato una select essendo che un progetto avra un type 
        // e quindi con find si trova il type che c'è nell valore nome che si trova nella select
        $type = type::find($data['nome']);
        // qua si fa find essendo che si cambia un progetto gia esistente
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
