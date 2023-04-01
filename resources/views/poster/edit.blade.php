@extends('layout.layout')

@section('content')
<section>
<div class="container mt-2">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Data</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('poster.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <form action="{{ route('poster.update',$data->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf

     
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Poster Name</strong>
                    <input type="text" name="poster_name" value="{{ $data->poster_name}}" class="form-control" placeholder="poster_name">
                </div>
            </div>

        
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" name="description" value="{{ $data->description}}" class="form-control" placeholder="Description">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Poster Image:</strong>
                    <input type="file" name="poster_img" class="form-control" placeholder="poster_img">

                    <img alt="img" src="{{asset('/public/poster_img/'.$data->poster_img)}}" width="100px">

                    <img alt="img" src="{{asset($data->image)}}" width="100px">

                </div>
            </div>

             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Poster Date:</strong>
                    <input  name="poster_date" class="form-control" placeholder="Date" value="{{ $data->poster_date}}" >
                </div>
            </div>

            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <input type="text" name="status" value="{{ $data->status}}" class="form-control" placeholder="Status">
                </div>
            </div>
            

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
     
    </form>

</section>
@endsection
