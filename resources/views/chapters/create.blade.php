@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @include('partials.message')
                @include('chapters.form')
            </div>
        </div>
    </div>
</div>

@endsection

