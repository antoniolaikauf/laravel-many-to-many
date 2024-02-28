<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\technology;

class ApiController extends Controller
{
    public function getTechnologies()
    {
        $technologies = technology::all();
        return response()->json([
            'message' => $technologies,
        ]);
    }

    public function createNewTechnology(Request $request)
    {
        $data = $request->all();
        $technology = new technology;

        $technology->nome_tecnologia = $data['nome'];

        $technology->save();

        return response()->json([
            'technology' => $technology,
        ]);
    }
}
