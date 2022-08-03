@extends('layouts.AdminLTE.index')
<style>
    .bulk-img {
    width: 100px;
    height: 100px;
}
</style>
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Image</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('categories.index') }}" title="Go back"> <i class="fa fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> 
            <ul>
                @foreach ($errors->all() as $error)
                    <li></li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category:</strong>
                    <b>{{ $category[0]->name }}</b>
                    <input type="hidden" value="{{ $category_id }}" name="category_id">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image[]" multiple="" class="form-control" placeholder="Name">
                </div>
            </div>
          
   
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            <div >
                @foreach($images as $img)
                <div class="remove-image-{{ $img->id }} col-xs-3 col-sm-3 col-md-3">
                    <img src="/images/{{ $img->image_name }}" class="bulk-img image-{{ $img->id }}">
                    <a href="javascript:void(0);" class="remove" data-id="{{ $img->id }}">X</a>
                </div>
                @endforeach
            </div>
        </div>

    </form>
@endsection
