@extends('layouts.app')

@section('page-name', 'Lista delle tracks') 

@section('main-content')
{{-- @dump($tracks) --}}

<table class="table table-dark table-striped">
    
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Titolo</th>
            <th scope="col">Album</th>
            <th scope="col">Autore</th>
            <th scope="col">Editore</th>
            <th scope="col">Durata</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($tracks as $track)
            
            <tr>
              <th scope="row">{{ $track->id}}</th>
              <td>{{ $track->title}}</td>
              <td>{{ $track->album}}</td>
              <td>{{ $track->author}}</td>
              <td>{{ $track->editor}}</td>
              <td>{{ $track->lenght}}</td>
            </tr>

            @endforeach
          
          </tbody>
        </table>
  </table>
@endsection   

