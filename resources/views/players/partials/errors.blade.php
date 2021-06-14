@if ($errors->any())
    <div class="toast toast-error">
        @foreach($errors->all() as $error)
            <span>{{$error}}</span><br>
        @endforeach
    </div>
@endif