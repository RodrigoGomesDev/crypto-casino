<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\User;
use Illuminate\Support\Carbon;

class LeaderboardController extends Controller
{
    public function index(Request $request) {
        $game = $search = $request->query('game');
        $period = $search = $request->query('period');

        $users = User::selectRaw('users.id, users.name, COUNT(games.id) AS total_games, IFNULL(SUM(games.bet),0) AS total_bet, IFNULL(MAX(games.win),0) AS max_win, IFNULL(SUM(games.win),0) AS total_win, IFNULL(SUM(games.win-games.bet),0) AS total_net_win')
            ->leftJoin('accounts', 'accounts.user_id', '=', 'users.id')
            ->leftJoin('games', 'games.account_id', '=', 'accounts.id')
            ->where('users.status', User::STATUS_ACTIVE)
            ->where('games.status', Game::STATUS_COMPLETED)
            ->when($game, function($query, $game) use($request) {
                $provider = 'Packages\Game' . $game . '\Providers\PackageServiceProvider';
                $model = 'Packages\Game' . $game . '\Models\Game' . $game;
                // if game service provider is loaded
                if (array_key_exists($provider, app()->getLoadedProviders())) {
                    $query->where('games.gameable_type', $model);
                    // for multi slots games add extra clause on the game index column
                    if ($model == 'Packages\GameMultiSlots\Models\GameMultiSlots') {
                        $index = intval($request->query('index'));
                        $query->join('game_multi_slots', 'games.gameable_id', '=', 'game_multi_slots.id');
                        $query->where('game_multi_slots.game_index', $index);
                    // for lukcy wheel games add extra clause on the game index column
                    } elseif ($model == 'Packages\GameLuckyWheel\Models\GameLuckyWheel') {
                        $index = intval($request->query('index'));
                        $query->join('game_lucky_wheel', 'games.gameable_id', '=', 'game_lucky_wheel.id');
                        $query->where('game_lucky_wheel.game_index', $index);
                    }
                }
            })
            ->when($period, function($query, $period) {
                if ($period == 'CurrentWeek') {
                    $query->where('games.updated_at', '>=', (new Carbon())->startOfWeek());
                } elseif ($period == 'CurrentMonth') {
                    $query->where('games.updated_at', '>=', (new Carbon())->startOfMonth());
                } elseif ($period == 'PreviousMonth') {
                    $query
                        ->where('games.updated_at', '>=', (new Carbon())->startOfMonth()->subMonth())
                        ->where('games.updated_at', '<', (new Carbon())->startOfMonth());
                } elseif ($period == 'CurrentYear') {
                    $query->where('games.updated_at', '>=', (new Carbon())->startOfYear());
                }
            })
            ->groupBy('users.id','name')
            ->orderBy('total_win', 'desc')
            ->get();
            // ->paginate($this->rowsPerPage);

        return response()->json($users);
    }
}
