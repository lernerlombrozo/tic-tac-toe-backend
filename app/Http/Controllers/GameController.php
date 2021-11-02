<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Game::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $board = $requestData['board'];
        $requestData['board'] = json_encode($board);
        return Game::create($requestData);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Game::find($id);
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
        $game = Game::find($id);
        $game->update($request->all());
        return $game;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Game::delete($id);
    }

    /**
     * Join a game
     *
     * @return \Illuminate\Http\Response
     */
    public function join(Request $request)
    {
        $requestData = $request->all();
        $id = $requestData['id'];
        $p2 = $requestData['player2'];
        $game = Game::find($id);
        $p1 = $game->player1;
        if ($p2 == $p1) {
            return $game;
        }
        $game->update(['player2' => $p2]);
        return $game;
    }

    /**
     * Move
     *
     * @return \Illuminate\Http\Response
     */
    public function move(Request $request)
    {
        $requestData = $request->all();
        $currentPlayer = $requestData['player'];
        $move = $requestData['move'];
        $id = $requestData['id'];
        $game = Game::find($id);
        $currentTurn = $game->currentTurn;
        $player1 = $game->player1;
        $player2 = $game->player2;
        $playerInTurn = $currentTurn == 1 ? $player1 : $player2;
        if ($currentPlayer !== $playerInTurn) {
            return 'bad baby';
        }
        $nextTurn = $currentTurn == 1 ? 2 : 1;
        $boardObject = $game->board;
        $board = json_decode($boardObject);
        if (count($move) === 3) {
            $board[$move[0]][$move[1]][$move[2]] = $currentTurn;
        } else {
            $board[$move[0]][$move[1]] = $currentTurn;
        }
        $game->update(['currentTurn' => $nextTurn, 'board' => $board]);
        return $game;
    }

    /**
     * Win the game. Decided in the frontend cause I have counted time and am better with js
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function win(Request $request)
    {
    }
}
