@extends('layouts.admin')

@section('content')
<div class="container mt-5">

    @include('partials.session_message')
    <div class="d-flex justify-content-between">
        <h1 class="m-3">Tipologia di progetti</h1>

        <a class="nav-link text-black  d-flex align-items-center gap-2" href="{{ route('admin.types.create') }}">
            <i class="fa-solid fa-plus fa-sm fa-fw"></i>
            <span class="flex-fill">Aggiungi Nuova Tipologia</span>
        </a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>

            @foreach ( $typeList as $type)
            <tr>
                <th scope="row">{{$type->id}}</th>
                <td>{{$type->name}}</td>
                <td>{{$type->slug}}</td>

                <td class="d-flex gap-2">


                    <form action="{{route('admin.types.destroy',  ['type' => $type->id] )}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger" title="Elimina" onclick="return confirm('Sei sicuro di volerlo eliminare {{$type->name}}? ')"><i class="fa-solid fa-trash-can "></i></button>

                    </form>
                </td>
            </tr>
            @endforeach



        </tbody>
    </table>

</div>

@endsection