<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\PlayerClass;
use App\Models\Rank;
use App\Models\Specialization;
use App\Http\Requests\Player\StorePlayer;
use App\Http\Requests\Player\UpdatePlayer;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'players'   => Player::with('rank', 'class', 'specialization', 'specialization.role')->get(),
            'classes'   => PlayerClass::with('specializations', 'specializations.role')->get(),
            'ranks'     => Rank::all(),
        ];

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlayer $request)
    {
        $player = Player::create($request->all());

        return response()->json($player);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlayer $request, $id)
    {
        $player = Player::findOrFail($id);

        $player->nickname           = $request->get('nickname');
        $player->class_id           = $request->get('class_id');
        $player->specialization_id  = $request->get('specialization_id');
        $player->rank_id            = $request->get('rank_id');
        $player->flavor             = $request->get('flavor');
        $player->description        = $request->get('description');
        $player->armory_url         = $request->get('armory_url');
        $player->warcraftlogs_url   = $request->get('warcraftlogs_url');

        $player->save();

        return response()->json($player);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $player = Player::findOrFail($id);

        $player->delete();

        return response()->json();
    }
}
