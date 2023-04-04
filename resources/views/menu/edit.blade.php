@extends('layout.layout')


@section('content')
<section>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2 ">
                <h2>Add New Menu</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('menu.index') }}"> All Post</a>
            </div>
        </div>
    </div>

    
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


        <form action="{{ route('menu.update',$menu->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="row">
            <input type="hidden" name="id" value="{{$menu->id}}">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Menu Title</strong>
                        <input value="{{$menu->title}}" type="text" name="title" class="form-control" placeholder="Menu Title">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Menu Description</strong>
                        <textarea class="form-control" placeholder="Menu Description" name="description" id="description" cols="100" rows="3">{{$menu->description}}</textarea>
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Image</strong>
                        <input type="file" name="images" class="form-control" placeholder="Uplpoad Images">
                        <input type="hidden" name="hidden_menu_image" class="form-control" placeholder="Image" value="{{$menu->images}}">
                        <img class="mt-2" src="{{asset('/storage/app/'.$menu->images)}}" width="300px">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Menu Price</strong>
                        <textarea class="form-control" placeholder="Menu Price" name="price" id="price" cols="100" rows="3">{{$menu->price}}</textarea>
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Update menu</button>
            </div>
        </div>
    </form>
</div>
</section>
@endsection
