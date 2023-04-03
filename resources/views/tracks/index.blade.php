@extends('layouts.app')

@section('page-name', 'Lista delle tracks') 

@section('cdn')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
@endsection

@section('main-content')
{{-- @dump($tracks) --}}

<form class="d-flex my-5">
  <input class="form-control me-sm-2" type="text" name="term" placeholder="Search">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>

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
                <a href="{{ route('tracks.show', ['track' => $track]) }}">
                  <i class="bi bi-box-arrow-up-right"></i>
                </a> 
            </td>
            </tr>

            @endforeach
          
          </tbody>
        </table>

        {{ $tracks->links("pagination::bootstrap-5")}}
@endsection   

