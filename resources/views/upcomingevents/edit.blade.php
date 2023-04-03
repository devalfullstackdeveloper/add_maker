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
                <a class="btn btn-primary" href="{{ route('event.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <form action="{{ route('event.update',$data->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('POST')
     
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ $data->title}}" class="form-control" placeholder="Title">
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
                    <strong>Icon:</strong>
                    <input type="file" name="icon" class="form-control" placeholder="icon">
                 <img alt="img" src="{{asset('/public/event_image/'.$data->icon)}}" width="100px">
                </div>
            </div>

             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date:</strong>
                    <input  name="date" class="form-control" placeholder="Date" value="{{ $data->date}}" >
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
