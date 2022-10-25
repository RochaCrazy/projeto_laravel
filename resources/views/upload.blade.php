@extends('layouts.main')

@section('title', 'Vídeos')

@section('content')

<form action="{{route('mamei')}}" method="POST" enctype="multipart/form-data">
@csrf
    <div class="mb-3">
        <label for="formFile" class="form-label">Upload Video</label>
        <input class="form-control" name="nameVideo" type="text">
        <input class="form-control" name="fileVideo" type="file" id="chooseVideo">
    </div>
    <div class="col-12">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection