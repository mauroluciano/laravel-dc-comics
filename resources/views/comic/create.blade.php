@extends('layouts.app')

@section('main-content')
<div class='container'>
    <a href="{{route('comics.index')}}" class="btn btn-primary">Torna alla lista</a>
    <h1>Insert a new comic</h1>
{{-- * Conditions for printing errors --}}
@if($errors->any())
<h2>Correct following errors:</h2>
<ul>
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>  
    @endforeach
</ul>
@endif

    <form action="{{route('comics.store')}}" method="POST" class="row g-3">
        @csrf
        <div class="col-4">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}" >
            {{-- * For printing errors --}}
            @error('title')
    	    <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-4">
            <label for="series">Series</label>
            <input type="text" id="series" name="series" class="form-control @error('series') is-invalid @enderror" value="{{old('series')}}" >
            @error('series')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-4">
            <label for="type">Type</label>
            <input type="text" id="type" name="type" class="form-control @error('type') is-invalid @enderror" value="{{old('type')}}">
            @error('type')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-4">
            <label for="price">Price</label>
            <input type="text" id="price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}">
            @error('price')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-4">
            <label for="sale_date">Sale Date</label>
            <input type="text" id="sale_date" name="sale_date" class="form-control @error('sale_date') is-invalid @enderror" value="{{old('sale_date')}}">
            @error('sale_date')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-4">
            <label for="thumb">Image</label>
            <input type="text" id="thumb" name="thumb" class="form-control @error('thumb') is-invalid @enderror" value="{{old('thumb')}}">
            @error('thumb')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="col-12">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" >{{old('description')}}</textarea>
            @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div>
            <button class="btn btn-danger">Save</button>
        </div>
    </form>
</div>
@endsection