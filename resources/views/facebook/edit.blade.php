@extends('layout.layout')

@section('content')
<section>
<div class="container-fluid mt-2">
        <div class="page-title-wrap">
            <div class="title-wrap">
                <h2>Edit Data</h2>
            </div>
            <div class="button-wrap">
                <a class="btn btn-primary" href="{{ route('fbook.index') }}"> Back</a>
            </div>
        </div>
    
   
    <form action="{{ route('fbook.update',$data->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
       
        <div class="edit-form-wrap">
           <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ $data->title}}" class="form-control" placeholder="Facebook Title">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" name="description" value="{{ $data->description}}" class="form-control" placeholder="Facebook Description">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="Facebook Image">
                  

                    <input type="hidden" name="hidden_facebook_image" class="form-control" placeholder="Facebook Image" value="{{$data->industry_image}}">

                    <img class="list-img" src="{{asset('/storage/app/'.$data->image)}}" alt="{{$data->title}}">

                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Status:</strong>
                    <input type="text" name="status" value="{{ $data->status}}" class="form-control" placeholder="Facebook Status">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            

            <div class="col-xs-12 col-sm-12 col-md-12 text-right mt-4">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
        </div>
    </form>
    </div>
</section>
@endsection
