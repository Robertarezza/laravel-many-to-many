@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>crea una nuova tipologia</h1>
    <div class="container" style="margin-top:100px;">
  <h3>Aggiungi una nuova Tipologia di Progetto all'archivio</h3>

  @include('partials.errors')


  <form action="{{ route('admin.types.store') }}" method="POST" enctype="multipart/form-data">
    {{-- Cookie per far riconoscere il form al server --}}
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">Titolo</label>
      <input type="text" class="form-control " id="name" name="name" value="{{ old('name') }}">
    </div>

    

    <div class="d-flex justify-content-around mt-3 mb-3 align-content-center align-items-center">
      <a href="{{ route('admin.types.index') }}" class="btn btn-outline-secondary">Indietro</a>
      <button class="btn btn-outline-primary" type="submit">Salva</button>
    </div>
  </form>

</div>


@endsection