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
            <a class="btn btn-primary" href="{{ route('bcard.index') }}"> Back</a>
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

<form action="{{ route('bcard.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Description</strong>
<input type="text" name="description" class="form-control" placeholder="add description">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>



<div class="form-group">
<strong>Image</strong>
<input type="file" name="image" class="form-control" placeholder="add image">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>  
@enderror
</div>

<div class="form-group">
<strong>Date</strong>
<input type="date" name="date" class="form-control" placeholder="add date">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>

<div class="form-group">
<strong>Status</strong>
<input type="text" name="status" class="form-control" placeholder="add status">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>


</div>


<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</div>
</form>

</section>
@endsection

