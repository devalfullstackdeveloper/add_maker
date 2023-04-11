@extends('layout.layout')



@section('content')
<section> 
<div class="container mt-2">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Data</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('instagram.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
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
                    <strong>Image:</strong>
                    <img class="list-img" alt="img" src="{{asset('/storage/app/'.$data->image)}}">
                </div>
            </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <input type="text" name="status" value="{{ $data->status}}" class="form-control" placeholder="Status">
                </div>
            </div>
        
    </div>
</div>

</section>
@endsection



