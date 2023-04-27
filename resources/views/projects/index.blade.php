@extends('layouts.app')

@section('content')
<div class="container m-4">
    <div class="d-flex ">
        
        <a class="btn btn-primary ms-3" href="{{ route('projects.create')}}">Crea un nuovo progetto</a>
    </div>
</div>


<table class="table">
    <h3>I tuoi progetti</h3>
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Titolo</th>
        <th scope="col">Slug</th>
        <th scope="col">Data creazione</th>
        <th scope="col">Data modifica</th>
        <th scope="col">Eliminato</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($projects as $project)
            <tr>
                <td>{{$project->id}}</td>
                <td>
                <a  href="{{ route('projects.show',$project)}}">{{$project->title}}</a> 
                </td>
                <td>{{$project->slug}}</td>
                <td>{{$project->created_at}}</td>
                <td>{{$project->updated_at}}</td>
                <td>
                    {{ $project->trashed() ? $project->deleted_at : ""}}
                </td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-secondary btn-small" href="{{ route('projects.edit', $project)}}">Modifica</a>
                        <form action="{{route('projects.destroy', $project)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Elimina">
                        </form>
                        @if ($project->trashed())
                        <form action="{{route('projects.restore', $project)}}" method="POST">
                            @csrf

                            <input class="btn btn-success" type="submit" value="Ripristina">
                        </form>
                        @endif
                    </div>
                </td>
            </tr>

            {{-- //se non ci sono progetti appare questo --}}
            @empty
            <th colspan="6">Nessun post</th>
            <div>
                <a class="btn btn-primaty" href="{{ route('projects.create')}}">Crea un nuovo progetto</a>

            </div>
        @endforelse

            
    
    </tbody>
  </table>
@endsection