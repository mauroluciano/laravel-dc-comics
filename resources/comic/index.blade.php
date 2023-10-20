@extends('layouts.app')

@section('main-content')
  <section class="container mt-5">

    @forelse($comics as $comic)
      <p>
        <strong>Titolo</strong>: {{ $comic->title }} <br>
        <strong>Descrizione</strong>: {{ $comic->description }} <br>
        <strong>Immagine</strong>: {{ $comic->thumb }}
        <strong>Prezzo</strong>: {{ $comic->price }}
        <strong>Serie</strong>: {{ $comic->series }}
        <strong>Data di vendita</strong>: {{ $comic->sale_date }}
        <strong>Artista</strong>: {{ $comic->artists }}
        <strong>Scrittore</strong>: {{ $comic->writers }}


      </p>
      <hr>
    @empty
      <h2>Non ci sono risultati</h2>
    @endforelse
  </section>
@endsection