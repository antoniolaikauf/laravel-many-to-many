<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// imprtato i model che servono per il ocmpito 
use App\Models\technology;

class ApiController extends Controller
{
    // creato dei metodi per far richieste al database e farle ritornare in un json 
    public function getTechnologies()
    {
        // con pagination ti ritornerà un oggetto diverso rispetto ad all()
        // ti darà piu opzioni per abbellire la tua pagina 
        $technologies = technology::paginate(5);
        return response()->json([
            'message' => $technologies,
        ]);
    }

    public function createNewTechnology(Request $request)
    {
        // qua si crea un nuovo oggetto 
        $data = $request->all();
        $technology = new technology;

        $technology->nome_tecnologia = $data['nome'];

        $technology->save();

        return response()->json([
            'technology' => $technology,
        ]);
    }
}
