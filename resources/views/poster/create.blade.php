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
            <a class="btn btn-primary" href="{{ route('poster.index') }}"> Back</a>
        </div>
    </div>
</div>
<form action="{{ route('poster.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Poster Name</strong>
<input type="text" name="poster_name" class="form-control" placeholder="Name">
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
<strong>Poster Image:</strong>
<input type="file" name="poster_img" class="form-control" placeholder="Icon">
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Poster Date:</strong>
<input name="poster_date" class="form-control" placeholder="Date">
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Status</strong>
<input type="text" name="status" class="form-control" placeholder="Status">
</div>
</div>

<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</div>

</form>

</section>
@endsection

