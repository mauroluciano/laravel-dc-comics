@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('main-content')
<div class="container">
<h1>Comics List</h1>
<div class='container'>
    <a href="{{route('comic.create')}}" class="btn btn-primary">Aggiungi un comic</a>
</div>
<table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Price</th>
        <th scope="col">Series</th>
        <th scope="col">Sale Date</th>
        <th scope="col">Type</th>
        <th scope="col">Creation</th>
        <th scope="col">Last Update</th>
        <th scope="col"></th>

      </tr>
    </thead>
    <tbody>
        @foreach ($comics as $comic)
        <tr>
          <td>{{$comic->id}}</td>
          <td>{{$comic->title}}</td>
          <td>{{$comic->description}}</td>
          <td>{{$comic->price}}</td>
          <td>{{$comic->series}}</td>
          <td>{{$comic->sale_date}}</td>
          <td>{{$comic->type}}</td>
          <td>{{$comic->created_at}}</td>
          <td>{{$comic->updated_at}}</td>
          <td>
            <div class="d-flex">
              <a href="{{route('comic.show', $comic)}}" class="mx-1">
                  <i class="fa-regular fa-eye"></i>
              </a>
              <a href="{{route('comic.edit', $comic)}}" class="mx-1">
                <i class="fa-solid fa-pencil"></i>
              </a>
              <a href="#" data-bs-toggle="modal" data-bs-target="#delete-modal-{{$comic->id}}" class="mx-1">
                <i class="fa-solid fa-trash text-danger"></i>  
              </a>
              <div class="modal fade" id="delete-modal-{{$comic->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Comic</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Are you sure? Do you want to delete the comic: "{{$comic->title}}"?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Retry</button>
                      
                      <form action="{{route('comic.destroy', $comic)}}" method="POST" class="mx-1">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger">
                      Confirm
                      </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection