@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-5">

    @include('partials.session_message')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card w-100 d-flex flex-row border-0">

                <div class="card-body mt-2">
                    <h5 class="card-title">{{ $type->name }}</h5>

                    @if($type->projects->isNotEmpty())
                    <p class="card-text">Progetti appartenenti a questa tipologia:</p>
                    <ul>
                        @foreach($type->projects as $project)
                        <li>{{ $project->title }}</li>
                        @endforeach
                    </ul>
                    @else
                    <p class="card-text">Nessun progetto presente per questa tipologia.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-center mt-5">
        <a href="{{ route('admin.types.index') }}" class="btn btn-outline-primary" title="Indietro">
            <i class="fa-solid fa-square-caret-left"></i>
        </a>
        <a href="{{ route('admin.types.edit', ['type' => $type->id]) }}" class="btn btn-outline-warning" title="Modifica">
            <i class="fa-solid fa-file-pen"></i>
        </a>
    </div>
</div>
@endsection