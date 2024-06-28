@extends('layouts.admin')

@section('content')
<div class="container" style="margin-top:100px;">
  <h3>Aggiungi un nuovo Comic all'archivio</h3>

  @include('partials.errors')


  <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
    {{-- Cookie per far riconoscere il form al server --}}
    @csrf

    <div class="mb-3">
      <label for="title" class="form-label">Titolo</label>
      <input type="text" class="form-control " id="title" name="title" value="{{ old('title') }}">
    </div>

    <div class="mb-3">
      <h5>Seleziona le Tecnologie:</h5>
      <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">

        @foreach ($technologies as $technology )

        <input @checked(in_array ($technology->id, old('technologies', [] ))) type="checkbox" class="btn-check" id="technology-{{$technology->id}}" value="{{$technology->id}}" name="technologies[]">
        <label class="btn btn-outline-primary" for="technology-{{$technology->id}}">{{$technology->name}} 1</label>

        @endforeach

      </div>
    </div>

    <div class="mb-3">
      <label for="status" class="form-label">Stato di Lavorazione</label>
      <select class="form-select" id="status" name="status">
        <option>Seleziona</option>
        <option @selected(old('status')==='ongoing' ) value="ongoing">In lavorazione</option>
        <option @selected(old('status')==='completed' ) value="completed">Completato</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="type_id" class="form-label">Tipologia</label>
      <select class="form-select" id="type_id" name="type_id">
        <option>Seleziona</option>
        @foreach ($types as $type)
        <option @selected(old('type_id')==$type->id) value="{{ $type->id }}">{{ $type->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="description" class="form-label">Descrizione</label>
      <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
    </div>

    <div class="mb-3">
      <label for="cover_image" class="form-label">Immagine di copertina</label>
      <input class="form-control" type="file" id="cover_image" name="cover_image">
    </div>

    

    <div class="d-flex justify-content-around mt-3 mb-3 align-content-center align-items-center">
      <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">Indietro</a>
      <button class="btn btn-outline-primary" type="submit">Salva</button>
    </div>
  </form>
</div>
@endsection