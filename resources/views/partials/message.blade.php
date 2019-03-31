@if(count($errors) > 0)
<div class="notification is-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('success'))
    <div class="notification is-success">
        {{ session('success') }}
    </div>
@endif