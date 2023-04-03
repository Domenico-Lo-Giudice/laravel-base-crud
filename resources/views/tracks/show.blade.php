@extends('layouts.app')

@section('page-name', 'Dettaglio Track ' . $track->id)

@section('main-content')
<img src="{{ $track->poster }}" class="mb-3">
 <ul>
    @foreach ($track->getAttributes() as $attr => $value)
        
    <li> <strong>{{ $attr }}: </strong>{{ $value}}</li>
    @endforeach
 </ul>
@endsection   
 