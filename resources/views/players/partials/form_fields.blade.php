<div class="form-group">
    <label class="form-label" for="first_name">First Name</label>
    <input class="form-input" type="text" name="first_name" value="{{old('first_name', $player->first_name)}}">

    <label class="form-label" for="last_name">Last Name</label>
    <input class="form-input" type="text" name="last_name" value="{{old('last_name', $player->last_name)}}">

    <label class="form-label" for="first_name">Team Name</label>
    <input class="form-input" type="text" name="team" value="{{old('team', $player->team)}}">

    <label class="form-label" for="jersey_number">Jersey Number</label>
    <input class="form-input" type="text" name="jersey_number" value="{{old('jersey_number', $player->jersey_number)}}">

    <label class="form-label" for="position">Position</label>
    <select class="form-select" name="position">
        @php($positions = array('P', 'C', '1B', '2B', '3B', 'SS', 'LF', 'CF', 'RF'))
        <option value=''>--Select A Position--</option>
        @foreach($positions as $position)
            <option value={{$position}} {{$position==old('position', $player->position) ? 'selected' : ''}}>
                {{$position}}
            </option>
        @endforeach
    </select>

    <label class="form-label" for="age">Age</label>
    <input class="form-input" type="number" name="age" value="{{old('age', $player->age)}}">

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href={{route('players.index')}}>Cancel</a>
</div>