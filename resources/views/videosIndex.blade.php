@extends('layouts.main')

@section('title', 'Vídeos')

@section('content')

<h1>Videos - <a href="{{route('mamado')}}">Upload</a></h1>

@foreach($images as $image)

<div class='index'>
    <a  href="{{route('chupei', substr($image,14,-4))}}">
        <img width="500" height="350" src="{{$image}}" alt="">
        <h2>{{substr($image,14,-4)}}</h2>
        <form action="{{route('chupado', substr($image,14,-4))}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <button type="submit" class="btn btn-danger">Delete</button>
                <a href="{{route('lambido', substr($image,14,-4))}}">
                    <button type="button" class="btn btn-warning">Edit</button> 
                </a>   
            </div>                 
        </form>        
    </a>
</div>
    
@endforeach


@endsection