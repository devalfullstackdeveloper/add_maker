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
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> All Post</a>
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
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Post Description</strong>
                        <textarea class="form-control" placeholder="Post Description" name="description" id="description" cols="100" rows="3">{{$post->description}}</textarea>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Image</strong>
                            <input type="file" name="images" class="form-control" placeholder="Uplpoad Images">
                            <img class="mt-2" src="{{asset('/public/fbpost_image/'.$post->images)}}" width="300px">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Update Post</button>
            </div>
        </div>
    </form>
</div>
</section>
@endsection
