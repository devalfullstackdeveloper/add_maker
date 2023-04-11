@extends('layout.layout')


@section('content')
<section>
<div class="container mt-2">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mb-2 ">
            <h2>Add New Data</h2>
        </div>
        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('allposts.index') }}"> Back</a>
        </div>
    </div>
</div>
   

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('allposts.store') }}" method="POST" enctype="multipart/form-data">




@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">

<strong>Name</strong>

<input type="text" name="name" class="form-control" placeholder="Name">
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
<strong>Description</strong>
<input type="text" name="description" class="form-control" placeholder="Description">
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Image:</strong>
<input type="file" name="image" class="form-control" placeholder="Image">
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Thumbnail:</strong>

<input type="file" name="thumbnail" class="form-control" placeholder="Thumbnail">


</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Caption:</strong>

<input type="text" name="caption" class="form-control" placeholder="Caption">
</div>
</div>


<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Start Date:</strong>

<input type="date"  name="start_date" class="form-control" placeholder="Date">

</div>
</div>


<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>End Date:</strong>

<input type="date"  name="end_date" class="form-control" placeholder="Date">

</div>
</div>


<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">

<strong>Status:</strong>

<input type="text" name="status" class="form-control" placeholder="Status">
</div>
</div>

<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</div>

</form>

</section>
@endsection

