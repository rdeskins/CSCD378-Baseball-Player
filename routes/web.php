<?php
/**
 * Name: Robin Deskins, CSCD 378 Extra Credit Assignment
 * Description: 
 * Updated CRUD assignment. 
 * 
 * I used Kyslik/column-sortable for table sorting. Found here: https://github.com/Kyslik/column-sortable 
 * I didn't want to use Livewire a second time and I've been curious about this package. 
 * 
 * To seed database, do 'php artisan db:seed' in command line. 
 * 
 * Players listing is on the /players page.
 * Each player's games can be seen on their particular show page. Adding and deleting games is done on the player's show page.
 * Edit has its own page, but an edit button can be found on a player's show page. 
 * Total's and batting average are shown at the very bottom of a player show page, below the games table. 
 */

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('players', PlayerController::class);

Route::resource('games', GameController::class, ['except'=>['index', 'create', 'show']]);
