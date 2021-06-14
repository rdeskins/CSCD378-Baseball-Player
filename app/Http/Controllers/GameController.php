<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Game;
use \App\Models\Player;
use Illuminate\Validation\Rule;

class GameController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validateData($request);
        $game = Game::make($validatedData);
        $player = Player::findOrFail($request->player_id);
        $player->games()->save($game);
        return redirect()->route('players.show', $request->player_id)->with('success', "Game #$game->game_number was added!");;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $game = Game::findOrFail($id);
        $player = Player::findOrFail($game->player_id);
        return view('games.edit')->with(compact('game', 'player'));
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
        $validatedData = $this->validateData($request, $id);
        $game = Game::findOrFail($id);
        $player = Player::findOrFail($request->player_id);
        $game->update($validatedData);
        return redirect()->route('players.show', $player->id)->with([
            'success' => "Game #$request->game_number was updated!"
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
        $game = Game::findOrFail($id);
        $game->delete();
        return redirect()->route('players.show', $game->player_id)->with('success', "Game #$game->game_number was deleted!");
    }

    private function validateData($request, $id=0) {
        $rules = [
            'game_number' => [
                'required',
                'integer',
                'between:1,162',
                Rule::unique('games')->where(function($query) use ($request) {
                    return $query->where('player_id', $request->player_id)->where('game_number', $request->game_number);
                })->ignore($id),
            ],
            'at_bats' => 'required|integer|gte:0',
            'runs' => 'required|integer|gte:0|lte:at_bats',
            'hits' => 'required|integer|gte:0|lte:at_bats',
            'walks' => 'required|integer|gte:0|lte:at_bats',
            'runs_batted_in' => 'required|integer|gte:0|lte:at_bats'
        ];
        $messages = [
            'lte' => ':Attribute must be less than or equal to at bats.'
        ];
        return $request->validate($rules, $messages);
    }
}
