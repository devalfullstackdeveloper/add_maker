@extends('layout.layout')


@section('content')
<section>
<div class="container-fluid mt-2">
    <div class="page-title-wrap">
        <div class="title-wrap">
                <h2>Add New Post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('iposts.index') }}">Back</a>
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


        <form action="{{ route('iposts.update',$ipost->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
         <div class="edit-form-wrap">
            <div class="row">
            <input type="hidden" name="id" value="{{$ipost->id}}">
                 <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Post Title</strong>
                        <input value="{{$ipost->title}}" type="text" name="title" class="form-control" placeholder="Post Title">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Post Description</strong>
                        <input class="form-control" placeholder="Post Description" name="description" id="description" cols="100" rows="3" value="{{$ipost->description}}">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Images</strong>
                        <input type="file" name="images" class="form-control" placeholder="Upload Images">
                        <input type="hidden" name="hidden_ipost_image" class="form-control" placeholder="Post Image" value="{{$ipost->images}}">
                        <img class="list-img" src="{{asset('/storage/app/'.$ipost->images)}}" width="300px">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                 <div class="col-xs-12 col-sm-12 col-md-12 text-right mt-4">
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </div>
    </form>
</div>
</section>
@endsection
