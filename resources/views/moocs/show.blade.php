@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @include('partials.message')
                <h1>{{ $mooc->title }}</h1>
                <p>{{ $mooc->resume }}</p>
        </div>
    </div>
</div>
@endsection
