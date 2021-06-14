@extends('layout')

@section('title', 'Edit Game')
@section('content')
    <div class="column col-3">
        @include('players.partials.errors')
        <form method="POST" action={{route('games.update', $game->id)}}>
            @csrf
            @method("PUT")
            @include('games.partials.form_fields')
        </form>
    </div>
    <a href={{route('players.show', $player->id)}}>Back</a>
@endsection
