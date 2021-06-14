@extends('layout')

@section('title', 'Player Listing')
@section('content')
    <a class='btn btn-primary' href={{route('players.create')}}>Add Player</a>
    <a class='btn' href={{route('players.index')}}>Clear Sorting</a>
    {{$players->appends(\Request::except('page'))->links()}}
    <table class='table table-striped table-hover'>
        <thead>
            <tr>
                <th>@sortablelink('first_name', 'First Name')</th>
                <th>@sortablelink('last_name', 'Last Name')</th>
                <th>@sortablelink('team')</th>
                <th>Position</th>
                <th>@sortablelink('age')</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        @foreach ($players as $player)
            <tr>
                <td>{{$player->first_name}}</td>
                <td>{{$player->last_name}}</td>
                <td>{{$player->team}}</td>
                <td>{{$player->position}}</td>
                <td>{{$player->age}}</td>
                <td><a href={{route('players.show', $player->id)}}>Show Detail</a></td>
                <td><a class='btn btn-primary' href={{route('players.edit', $player->id)}}>Edit</a></td>
                <td>@include('players.partials.delete_button')</td>
            </tr>
        @endforeach
    </table>
    {{$players->appends(\Request::except('page'))->links()}}
@endsection
