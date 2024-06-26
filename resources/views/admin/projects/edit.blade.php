@extends('layouts.admin')

@section('content')

<div class="container" style="margin-top:100px;">

    <!-- validazione -->
    @include('partials.errors')
    <!-- /validazione -->

    <h1>Modifica: {{$project->title}}</h1>
    <form action="{{ route('admin.projects.update', ['project'=>$project->slug]) }}" method="POST" enctype="multipart/form-data">
        {{-- Cookie per far riconoscere il form al server --}}
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{old('title', $project->title)}}">
        </div>

        <div class="mb-3">
            <h4>Tecnologie usate</h4>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">

                @foreach ($technologies as $technology )

                @if (old('technologies') !== null)

                <input @checked (in_array ( $technology->id, old('technologies', [] ))) type="checkbox" class="btn-check" id="technology-{{$technology->id}}" value="{{$technology->id}}" name="technologies[]">
                @else
                <input @checked($project->technologies->contains($technology)) type="checkbox" class="btn-check" id="technology-{{$technology->id}}" value="{{$technology->id}}" name="technologies[]">
                @endif

                <label class="btn btn-outline-primary" for="technology-{{$technology->id}}">{{$technology->name}} 1</label>
                @endforeach


            </div>
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug', $project->slug)}}">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Stato di lavorazione</label>
            <select class="form-select" id="status" name="status">
                <option>Seleziona</option>
                <option @selected(old('status', $project->status) ==='ongoing' ) value="ongoing">In lavorazione</option>
                <option @selected(old('status', $project->status) ==='completed' ) value="completed">Completato</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="type_id" class="form-label">Tipologia</label>
            <select class="form-select" id="type_id" name="type_id">
                <option>Seleziona</option>
                @foreach ($types as $type )
                <option @selected(old('type_id', $project->type?->id ) == $type->id) value="{{$type->id}}"> {{$type->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="3"> {{old('description', $project->description)}}</textarea>
        </div>

        <div class="d-flex">
            <div>
                <label for="cover_image">Immagine di copertina</label>
                <input type="file" name="cover_image" id="cover_image">
            </div>
            <div class="mb-3">
                <input type="checkbox" id="remove_cover_image" name="remove_cover_image">
                <label for="remove_cover_image">Rimuovi immagine di copertina</label>
            </div>
        </div>

        <div>
            <h4>Preview dell'immagine</h4>
            @if ($project->cover_image)
            <img id="cover_image_preview" src="{{ asset('storage/' . $project->cover_image) }}" alt="">
            @else
            <p>Nessuna immagine di copertina presente</p>
            @endif
        </div>

        <div class="d-flex justify-content-around mt-3 mb-3 align-content-center">
            <a href="{{route('admin.projects.index') }}" class="btn btn-outline-secondary ">Indietro</a>
            <button class="btn btn-primary" type="submit">Salva</button>
        </div>

    </form>
</div>

@endsection