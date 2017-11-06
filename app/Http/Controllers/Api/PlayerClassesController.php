<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PlayerClass;
use Illuminate\Http\Request;

class PlayerClassesController extends Controller
{
    public function index(Request $request)
    {
        $classes = PlayerClass::with('specializations')->get();

        return response()->json($classes);
    }
}
