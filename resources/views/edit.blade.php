@extends('layouts.main')

@section('title', 'Edit')

@section('content')

<form action="{{route('mordi', $codigodovideo)}}" method="POST" enctype="multipart/form-data">
@csrf
    <div class="mb-3">
        <label for="formFile" class="form-label"><h1>Editar Video</h1></label><br>
        <label for="formFoçe" class="form-label"><h2>Novo Nome</h2></label>
        <input class="form-control" name="nomeVideo" type="text" value='{{$codigodovideo}}' placeholder="Nome do Video">
        <label for="formFile" class="form-lavel"><h2>Old Thumbnail</h2></label><br>
        <img width="500" height="350" src="{{'http://127.0.0.1:8000/' . $oldImg}}" alt="">
        {{-- {{dd($oldImg)}} --}}
        <input class="form-control" name="fileImg" type="file">        
    </div>
    <div class="col-12">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection