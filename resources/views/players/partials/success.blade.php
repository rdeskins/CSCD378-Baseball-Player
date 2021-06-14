@if (session()->get('success'))
    <div class="toast toast-success">
        {{session()->get('success')}}
        @if (session()->get('success_id'))
            <a href={{route('players.show', session()->get('success_id'))}}>(view)</a>
        @endif
    </div>
@endif