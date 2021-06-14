@extends('layout')

@section('title', 'Edit Player')
@section('content')
    <div class="column col-3">
        @include('players.partials.errors')
        <form method="POST" action={{route('players.update', $player->id)}}>
            @csrf
            @method("PUT")
            @include('players.partials.form_fields')
        </form>
    </div>
@endsection
