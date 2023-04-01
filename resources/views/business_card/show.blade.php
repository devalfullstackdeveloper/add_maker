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
                <a class="btn btn-primary" href="{{ route('bcard.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <br><br><strong>Description:</strong><br>
                {{ $data->description }}

            <br><br><strong>Image:</strong><br>
                {{ $data->image }}

             <br><br><strong>Date:</strong><br>
                {{ $data->date }}

            <br><br><strong>Status:</strong><br>
                {{ $data->status }}
            </div>
        </div>
    </div>
</div>

</section>
@endsection
