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
}
