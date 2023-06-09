@extends('layout.layout')
@section('content')
<section>
<div class="container-fluid mt-2">
    <div class="page-title-wrap">
        <div class="title-wrap">
                <h2>Add New Menu</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('menu.index') }}"> Back</a>
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
        <div class="edit-form-wrap">
            <div class="row">
            <input type="hidden" name="id" value="{{$menu->id}}">
                 <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Menu Title</strong>
                        <input value="{{$menu->title}}" type="text" name="title" class="form-control" placeholder="Menu Title">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Menu Description</strong>
                        <input class="form-control" placeholder="Menu Description" name="description" id="description" cols="100" value="{{$menu->description}}">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Menu Price</strong>
                        <input  class="form-control" placeholder="Menu Price" name="price" id="price" cols="100" rows="3" value="{{$menu->price}}" > 
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                 <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Image</strong>
                        <input type="file" name="images" class="form-control" placeholder="Uplpoad Images">
                        <input type="hidden" name="hidden_menu_image" class="form-control" placeholder="Image" value="{{$menu->images}}">
                        <img class="list-img" src="{{asset('/storage/app/'.$menu->images)}}" width="300px">
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
