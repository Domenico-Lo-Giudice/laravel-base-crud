@extends('layouts.app')

@section('page-name', 'Lista delle tracks') 

@section('cdn')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
@endsection

@section('main-content')
{{-- @dump($tracks) --}}

<div class="row my-3">
  <form class="col-8 d-flex">
    <input class="form-control me-sm-2" type="text" name="term" placeholder="Search">
    <button class="btn btn-outline-success my-0" type="submit">Search</button>
  </form>

  <div class="col-4 d-flex">
    <a href="{{ route('tracks.create') }}"  type="button" class="btn btn-outline-success ms-auto">Crea Track</a>
  </div>

</div>

<table class="table table-dark table-striped">
    
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Titolo</th>
            <th scope="col">Album</th>
            <th scope="col">Autore</th>
            <th scope="col">Editore</th>
            <th scope="col">Durata</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          {{-- @dump($tracks) --}}
            @foreach ($tracks as $track)
            
            <tr>
              <th scope="row">{{ $track->id}}</th>
              <td>{{ $track->title}}</td>
              <td>{{ $track->album}}</td>
              <td>{{ $track->author}}</td>
              <td>{{ $track->editor}}</td>
              <td>{{ $track->length}}</td>
              <td> 
                <a href="{{ route('tracks.show', $track) }}">
                  <i class="bi bi-box-arrow-up-right"></i>
                </a> 
            </td>
            </tr>

            @endforeach
          
          </tbody>
        </table>

        {{ $tracks->links("pagination::bootstrap-5")}}
@endsection   

