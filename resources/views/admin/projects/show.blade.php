@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-5">

    @include('partials.session_message')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card w-100 d-flex flex-row border-0">
                @if ($project->cover_image)
                <div class="mt-3">
                    <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->title }}" class="img-fluid">
                </div>
                @endif
                <div class="card-body mt-2">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text">Tipologia: {{ $project->type ? $project->type->name : 'Non presente' }}</p>
                    <p>Tecnologie usate:</p>
                    <ul>

                        @forelse ($project->technologies as $technology)
                        <li>
                            {{ $technology->name }}
                        </li>
                        @empty
                        <li>
                            Nessuna Tecnologia usata
                        </li>
                        @endforelse
                    </ul>
                    <p class="card-text">Stato di lavorazione:
                        @if ($project->status == 'ongoing')
                        In Lavorazione
                        @elseif ($project->status == 'completed')
                        Completato
                        @endif
                    </p>
                    <p class="card-text">Slug: {{ $project->slug }}</p>
                    <p class="card-text">Descrizione:<br>
                        {{ $project->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-center mt-5">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-primary" title="Indietro">
            <i class="fa-solid fa-square-caret-left"></i>
        </a>
        <a href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}" class="btn btn-outline-warning" title="Modifica">
            <i class="fa-solid fa-file-pen"></i>
        </a>
    </div>
</div>
@endsection