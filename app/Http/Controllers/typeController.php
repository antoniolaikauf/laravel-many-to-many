<?php

namespace App\Http\Controllers;

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
}
