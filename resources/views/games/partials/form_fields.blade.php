<div class="form-group">
    <label class="form-label form-inline" for="game_number">
        Game number:
        <input class="form-input" type="number" name="game_number" value="{{old('game_number', $game->game_number)}}">
    </label>
    <label class="form-label form-inline" for="at_bats">
        At bats:
        <input class="form-input" type="number" name="at_bats" value="{{old('at_bats', $game->at_bats)}}">
    </label>
    <label class="form-label form-inline" for="runs">
        Runs:
        <input class="form-input" type="number" name="runs" value="{{old('runs', $game->runs)}}">
    </label>
    <label class="form-label form-inline" for="hits">
        Hits:
        <input class="form-input" type="number" name="hits" value="{{old('hits', $game->hits)}}">
    </label>
    <label class="form-label form-inline" for="walks">
        Walks:
        <input class="form-input" type="number" name="walks" value="{{old('walks', $game->walks)}}">
    </label>
    <label class="form-label form-inline" for="runs_batted_in">
        Runs batted in:
        <input class="form-input" type="number" name="runs_batted_in" value="{{old('runs_batted_in', $game->runs_batted_in)}}">
    </label>
    <input type="hidden" value="{{$player->id}}" name="player_id">
    <button class="btn btn-primary">Submit</button>
</div>