@extends('layouts.main')

@section('title', 'Vídeos')

@section('content')

<h1>Videos - <a href="{{route('mamado')}}">Upload</a></h1>

@foreach($images as $image)

<div class='index'>
    <a  href="{{route('chupei', substr($image,14,-4))}}">
        <img width="500" height="350" src="{{$image}}" alt="">
        <p>{{substr($image,14,-4)}}
            <form action="{{route('chupado', substr($image,14,-4))}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn">Deletar</button>
            </form>
        </p>
    </a>
</div>
    
@endforeach


@endsection