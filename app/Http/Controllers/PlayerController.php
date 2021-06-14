<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $players = Player::sortable()->paginate(20);

        return view('players.index')->with(compact('players'));
    }

    private function orderByPosition() {
        return Player::orderByRaw(
            "case position 
            when 'P' then 1 
            when 'C' then 2 
            when '1B' then 3
            when '2B' then 4
            when '3B' then 5
            when 'SS' then 6
            when 'LF' then 7
            when 'CF' then 8
            when 'RF' then 9 
            end"
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $player = new Player();
        return view('players.create')->with(compact('player'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validateData($request);

        $player = Player::create($validatedData);
        return redirect()->route('players.index')->with([
            'success' => "$player->first_name $player->last_name was added!",
            'success_id'=> $player->id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $player = Player::findOrFail($id);
        $game = new Game();
        return view('players.show')->with(compact('player', 'game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $player = Player::findOrFail($id);
        return view('players.edit')->with(compact('player'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $this->validateData($request);

        $player = Player::findOrFail($id);
        $player->update($validatedData);
        return redirect()->route('players.index')->with([
            'success' => "$player->first_name $player->last_name was updated!",
            'success_id' => $player->id
        ]);
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
        return redirect()->route('players.index')->with('success', "$player->first_name $player->last_name was deleted!");
    }

    private function validateData($request) {
        return $request->validate([
            'first_name' => 'required|alpha|max:255',
            'last_name' => 'required|alpha|max:255',
            'team' => 'required|max:255',
            'jersey_number' => 'required|numeric|digits_between:1,2',
            'position' => 'required',
            'age' => 'required|integer|gt:0'
        ]);
    }
}
