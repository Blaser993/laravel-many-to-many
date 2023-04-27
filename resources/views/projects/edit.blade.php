@extends('layouts.app')



@section('content')
<form class="px-5 my-3" method="POST" action="{{route('projects.update', $project)}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label class="form-label">Titolo</label>
      <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title', $project->title)}}">
        @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Contenuto</label>
        <textarea class="form-control @error('description') is-invalid @enderror "  name="description" >{{old('description', $project->description)}}</textarea>
        @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Salva</button>
    
</form>
@endsection
