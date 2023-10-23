@extends('layouts.app')

@section('main-content')

<div class="container ">
  {{-- Buttons to navigate --}}
  <a href="{{route('comics.index')}}" class="btn btn-primary">Torna alla lista</a>
  <a href="{{route('comics.edit', $comic)}}" class="btn btn-warning">Modifica</a>

    <div class="card my-3" style="max-width: 100%;">
        <div class="row g-0">
          <div class="col-md-3">
            <img src="{{$comic->thumb}}" class="img-fluid rounded-start" alt="comic image">
          </div>
          <div class="col-md-9">
            <div class="card-body">
              <h5 class="card-title"><strong>Title:</strong> {{$comic->title}}</h5>
              <p class="card-text"><strong>Series:</strong> {{$comic->series}}</p>
              <p class="card-text"><strong>Type:</strong> {{$comic->type}}</p>
              <p class="card-text"><strong>Sale Date:</strong> {{$comic->sale_date}}</p>
              <p class="card-text"><strong>Price:</strong> {{$comic->price}}</p>
              <p class="card-text"><strong>Description:</strong> <br> {{$comic->description}}</p>
              <p class="card-text"><small class="text-muted"><strong>Date Creation: </strong> {{$comic->created_at}}</small></p>
              <p class="card-text"><small class="text-muted"><strong>Last Update: </strong> {{$comic->updated_at}}</small></p>
            </div>
          </div>
        </div>
    </div>
    
@endsection