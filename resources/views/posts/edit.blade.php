@extends('layout.layout')
@section('content')
<section>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2 ">
                <h2>Add New Post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div >
        <div class="card-body">

            @if ($errors->any())
                <div class="mt-2 alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif  
        <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="row">
            <input type="hidden" name="id" value="{{$post->id}}">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Post Title</strong>
                        <input value="{{$post->title}}" type="text" name="title" class="form-control" placeholder="Post Title">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Post Description</strong>
                        <textarea class="form-control" placeholder="Post Description" name="description" id="description" cols="100" rows="3">{{$post->description}}</textarea>
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Image</strong>
                        <input type="file" name="images" class="form-control" placeholder="Uplpoad Images">
                        <input type="hidden" name="hidden_post_image" class="form-control" placeholder="Post Image" value="{{$post->images}}">
                        <img class="mt-2" src="{{asset('/storage/app/'.$post->images)}}" width="300px">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Update Post</button>
            </div>
        </div>
    </form>
</div>
</section>
@endsection
