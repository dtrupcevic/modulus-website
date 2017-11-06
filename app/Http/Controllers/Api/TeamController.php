<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(Player::with('class', 'specialization','specialization.role', 'rank')->get());
    }
}
