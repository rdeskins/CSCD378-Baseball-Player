@extends('layout')

@section('title', 'Add Player')
@section('content')
    <div class="column col-3">
        @include('players.partials.errors')
        <form method="POST" action={{route('players.store')}}>
            @csrf
            @include('players.partials.form_fields')
        </form>
    </div>
@endsection
