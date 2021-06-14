<form action={{route('players.destroy', $player->id)}} method="POST"
    onSubmit="return confirm('Are you sure you want to delete {{$player->first_name}}?');">
    @csrf
    @method("DELETE")
    <button class="btn btn-error" type="submit">Delete</button>
</form>