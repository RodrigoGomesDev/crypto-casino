<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Game;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function __construct(Game $game, Account $account)
    {
        //Desestruturando o model de game em uma váriavel
        $this->Game = $game;
    }
    
    public function index() {
        //Requerindo todos os jogos
        $game = $this->Game->all();

        //Mostrando em tela
        return response()->json($game);
    }
}
