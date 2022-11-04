@extends('layouts.main')

@section('title', 'Video')
    
@section('content')

<h1>{{substr($video,7,-4)}}
  <form action="{{route('chupado', substr($video,7,-4))}}" method="POST">
  @csrf
  @method('DELETE')
  <div class="btn-group" role="group" aria-label="Basic mixed styles example">
    <button type="submit" class="btn btn-danger">Delete</button>
    <a href="{{route('lambido', substr($video,7,-4))}}">
      <button type="button" class="btn btn-warning">Edit</button> 
    </a>   
  </div>  
  </form>
</h1>

  <video width="940" height="620" controls autoplay>
    <source src="{{'http://127.0.0.1:8000/'. $video}}" type="video/mp4">
    Your browser does not support the video tag.
  </video>


<form action="POST">

  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Nome</label>
    <input type="email" class="form-control" id="exampleFormControlInput1">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Comentário</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>

</form>

@endsection