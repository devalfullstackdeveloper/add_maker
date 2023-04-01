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
                <a class="btn btn-primary" href="{{ route('industry.index') }}"> Back</a>
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
  
<form action="{{ route('industry.update',$data->id) }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Industry type:</strong>
<input type="text" name="industry_type" value="{{ $data->industry_type }}" class="form-control" placeholder="Industry Yype">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Description:</strong>
<textarea class="form-control" style="height:150px" name="description" placeholder="Industry Description">{{$data->description}}</textarea>
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Industry Image:</strong>
<input type="file" name="industry_image" class="form-control" placeholder="Industry Image">
<img src="{{asset('/public/industry_image/'.$data->industry_image)}}" alt="{{$data->industry_type}}" style="width: 100px;">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<button type="submit" class="btn btn-primary ml-3">Update</button>
</div>
</div>
</form> 

</section>
@endsection
