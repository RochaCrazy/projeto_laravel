@extends('layouts.main')

@section('title', 'Vídeos')

@section('content')

<h1>Videos - <a href="{{route('mamado')}}">Upload</a></h1>

@foreach($images as $image)

<a  href="{{route('chupei', substr($image,14,-4))}}">
    <img src="{{$image}}" alt="">
    <p>{{substr($image,14,-4)}}</p>
</a>
    
@endforeach


@endsection