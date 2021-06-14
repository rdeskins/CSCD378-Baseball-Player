<table class="table">
    <thead>
        <tr>
            <th style="width: 5%"></th>
            <th style="width: 10%">Game #</th>
            <th>AB</th>
            <th>R</th>
            <th>H</th>
            <th>BB</th>
            <th>RBI</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    @foreach($player->games as $game)
        <tr>
            <td></td>
            <td>{{$game->game_number}}</td>
            <td>{{$game->at_bats}}</td>
            <td>{{$game->runs}}</td>
            <td>{{$game->hits}}</td>
            <td>{{$game->walks}}</td>
            <td>{{$game->runs_batted_in}}</td>
            <td><a class='btn btn-primary' href={{route('games.edit', $game->id)}}>Edit</a></td>
            <td>
                <form action={{route('games.destroy', $game->id)}} method="POST"
                onSubmit="return confirm('Are you sure you want to delete game #{{$game->game_number}}?');">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-error" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    <hr/>
    <tr>
        <td>Totals:</td>
        <td>--</td>
        <td>{{$player->games->sum('at_bats')}}</td>
        <td>{{$player->games->sum('runs')}}</td>
        <td>{{$player->games->sum('hits')}}</td>
        <td>{{$player->games->sum('walks')}}</td>
        <td>{{$player->games->sum('runs_batted_in')}}</td>
    </tr>
</table>