@extends('layouts.main')

@section('title', 'Vídeos')

@section('content')

<form action="{{route('mamei')}}" method="POST" enctype="multipart/form-data">
@csrf
    <div class="mb-3">
        <label for="formFile" class="form-label"><h1>Upload Video</h1></label>
        <input class="form-control" name="nomeVideo" type="text" placeholder="Nome do Video">
        <label for="formFile" class="form-lavel"><h2>Thumbnail</h2></label>
        <input class="form-control" name="fileImg" type="file">
        <label for="formFile" class="form-lavel"><h2>Video</h2></label>
        <input class="form-control" name="fileVideo" type="file" id="chooseVideo">
    </div>
    <div class="col-12">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection