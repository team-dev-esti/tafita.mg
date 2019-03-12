@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="{{ route('mooc.store') }}" method="POST">
                 @csrf
                <label for="">titre</label>
                <input type="text" name="title">
                <label for="">Resume</label>
                <textarea name="resume" id="" cols="30" rows="10"></textarea>
                <label for="">Pdf</label>
                <input type="file" name="pdf" id="">
                <button type="submit">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
