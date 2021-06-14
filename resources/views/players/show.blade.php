@extends('layout')

@section('title', 'Player Detail')
@section('content')
    <!-- Player detail -->
    <div class="card column col-4">
        <div class="card-header">
            <div class="card-title h5">{{$player->first_name}} {{$player->last_name}}</div>
            <div class="card-subtitle text-gray">{{$player->team}}</div>
            <div class="card-body">
                <p>Age: {{$player->age}}</p>
                <p>Jersey Number: {{$player->jersey_number}}</p>
                <p>Position: {{$player->position}}</p>
            </div>
            <div class="card-footer">
                <div class="btn-group">
                    <form action={{route('players.edit', $player->id)}} method="POST">
                        @method("GET")
                        <button class="btn btn-primary" type="submit">Edit</button>
                    </form>
                    @include('players.partials.delete_button')
                </div>
                <br><a href={{route('players.index')}}>Back</a>
            </div>
        </div>
    </div>
    <br/>

    <!-- Add new game form -->
    <hr/>
    <h4>Add New Game</h4>
    @include('players.partials.errors')
    <form method="POST" action="{{route('games.store')}}">
        @csrf
        @include('games.partials.form_fields')
    </form>
    <br/>

    <!-- View all previous games section -->
    <hr/>
    <h4>Previous Games</h4>
    <div class="panel">
        @if($player->games->count() > 0)
            @include('games.partials.game_table')
            <br/>
            <h5>Batting Average: {{round($player->games->sum('hits')/$player->games->sum('at_bats')*100, 2)}}%</h5>
        @else 
            <p>No games yet! Try adding one for this player!</p>
            <br/>
        @endif
    </div>
@endsection
