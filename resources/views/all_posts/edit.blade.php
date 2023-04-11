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

                <a class="btn btn-primary" href="{{ route('allposts.index') }}"> Back</a>

            </div>
        </div>
    </div>
   

    <form action="{{ route('allposts.update',$data->id) }}" method="POST" enctype="multipart/form-data"> 

        @csrf
        @method('POST')
     
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">

                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $data->name}}" class="form-control" placeholder="Name">

                </div>
            </div>

        
            <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">
            <strong>Category Type</strong>
            <select class="custom-select"  name="category_type">
                @foreach($category as $cat)
            <option value="{{$cat->id}}">{{$cat->title}}</option>
                @endforeach
            </select>
            </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">
            <strong>Industry Type</strong>
            <select class="custom-select"  name="industry_type">
                @foreach($industryType as $industryTypeData)
            <option value="{{$industryTypeData->industry_type}}">{{$industryTypeData->industry_type}}</option>
                @endforeach
            </select>
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

                      <input type="file" name="allpost_image" class="form-control" placeholder="Image">
                        <input type="hidden" name="hidden_allpost_image" class="form-control" placeholder="Image" value={{$data->image}}>
                        <img src="{{asset('/storage/app/'.$data->image)}}" alt="{{$data->image }}" style="width: 100px;">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Thumbnail:</strong>
                      <input type="file" name="allpost_thumbnail" class="form-control" placeholder="Thumbnail">
                        <input type="hidden" name="hidden_allpost_thumbnail" class="form-control" placeholder="Thumbnail" value={{$data->thumbnail}}>
                        <img src="{{asset('/storage/app/'.$data->thumbnail)}}" alt="{{$data->thumbnail}}" style="width: 100px;">

                </div>
            </div>

             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">

                    <strong>Caption:</strong>
                    <input type="text" name="caption" value="{{ $data->caption}}" class="form-control" placeholder="Caption">
                </div>
            </div>

             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Start Date:</strong>
                    <input type="date"  name="start_date" class="form-control" placeholder="Date" value="{{ $data->start_date}}" >
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>End Date:</strong>
                    <input type="date"  name="end_date" class="form-control" placeholder="Date" value="{{ $data->end_date}}" >
                 
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
