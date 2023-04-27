@extends('layouts.app')

@section('content')
<form class="px-5 my-3" method="POST" action="{{route('projects.store')}}">
    @csrf
    <div class="mb-3">
      <label class="form-label">Titolo</label>
      <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1" value="{{old('title')}}">
        @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">Contenuto</label>
        <textarea class="form-control @error('description') is-invalid @enderror "  name="description" >{{old('description')}}</textarea>
        @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Crea progetto</button>
    
</form>
@endsection