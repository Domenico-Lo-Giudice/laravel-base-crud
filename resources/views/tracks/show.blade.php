@extends('layouts.app')

@section('page-name', 'Dettaglio Track ' . $track->id)

@section('main-content')
<img src="{{ $track->poster }}" class="mb-3">

<div class="row g-3 gx-5">
 

   <div class="col-6">
           <label class="form-label"> <strong>Titolo</strong> </label>
            <br>
           {{$track->title}}
   </div>

   <div class="col-6">
       <label class="form-label"> <strong>Album</strong> </label>
      <br>
       {{$track->album}}
   </div>

   <div class="col-6">
      <div class="row gy-3 gx-5">
         <div class="col-6">
       <label class="form-label"> <strong>Autore</strong> </label>
       <br>
       {{$track->author}}
   </div>

   <div class="col-6">
       <label class="form-label"> <strong>Editore</strong> </label>
      
       <br>
       {{$track->editor}}
   </div>

   <div class="col-6">
       <label class="form-label"> <strong> Durata</strong></label>
       
       <br>
       {{$track->length}}
   </div>

   
   
   
</div>
@endsection   
 