@extends('layouts.app')

@section('page-name', 'Nuova Track') 

@section('main-content')

<form action="{{ route('tracks.store')}}" method="POST" class="row g-3 gx-5">

    <div class="col-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title">
    </div>

    <div class="col-3">
        <label for="album" class="form-label">Album</label>
        <input type="text" class="form-control" id="album" name="album">
    </div>

    <div class="col-3">
        <label for="author" class="form-label">Autore</label>
        <input type="text" class="form-control" id="author" name="author">
    </div>

    <div class="col-3">
        <label for="editor" class="form-label">Editore</label>
        <input type="text" class="form-control" id="editor" name="editor">
    </div>

    <div class="col-3">
        <label for="length" class="form-label">Durata</label>
        <input type="text" class="form-control" id="length" name="length">
    </div>

    <div class="col-3">
        <label for="poster" class="form-label">Poster</label>
        <input type="text" class="form-control" id="poster" name="poster">
    </div>
    
</form>

@endsection  