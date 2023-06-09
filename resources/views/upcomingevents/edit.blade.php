@extends('layout.layout')

@section('content')
<section>
<div class="container-fluid mt-2">
    <div class="page-title-wrap">
        <div class="title-wrap">
                <h2>Edit Data</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('event.index') }}"> Back</a>
            </div>
        </div>

   
    <form action="{{ route('event.update',$data->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('POST')
      <div class="edit-form-wrap">
         <div class="row">
           <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ $data->title}}" class="form-control" placeholder="Title">
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
                    <strong>Date:</strong>
                    <input type="date"  name="date" class="form-control" placeholder="Date" value="{{ $data->date}}" >
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
                    <strong>Icon:</strong>
                      <input type="file" name="icon" class="form-control" placeholder="Icon">
                        <input type="hidden" name="hidden_event_image" class="form-control" placeholder="Icon" value={{$data->icon}}>
                        <img src="{{asset('/storage/app/'.$data->icon)}}" alt="{{$data->icon}}" style="width: 100px;">
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
