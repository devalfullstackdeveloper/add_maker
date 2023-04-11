@extends('layout.layout')

@section('content')
<section>
<div class="container-fluid mt-2">
    <div class="page-title-wrap">
        <div class="title-wrap">
                <h2>Edit Data</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('poster.index') }}"> Back</a>
            </div>
        </div>
  
   
    <form action="{{ route('poster.update',$data->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf

     <div class="edit-form-wrap">
         <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Poster Name</strong>
                    <input type="text" name="poster_name" value="{{ $data->poster_name}}" class="form-control" placeholder="poster_name">
                </div>
            </div>

        
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" name="description" value="{{ $data->description}}" class="form-control" placeholder="Description">
                </div>
            </div>
            
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Poster Date:</strong>
                    <input type="date" name="poster_date" class="form-control" placeholder="Date" value="{{ $data->poster_date}}" >
                </div>
            </div>

            
          <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Status:</strong>
                    <input type="text" name="status" value="{{ $data->status}}" class="form-control" placeholder="Status">
                </div>
            </div>
            
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Poster Image:</strong>
                    <input type="file" name="poster_img" class="form-control" placeholder="poster_img">
                     <input type="hidden" name="hidden_poster_img" class="form-control" placeholder="Poster Image" value={{$data->poster_img}}>
                        <img  class="list-img" src="{{asset('/storage/app/'.$data->poster_img)}}" alt="{{$data->poster_name}}" style="width: 100px;">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-right mt-4">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
     
    </form>
</div>
</section>
@endsection
