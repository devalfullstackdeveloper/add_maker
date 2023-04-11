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
                <a class="btn btn-primary" href="{{ route('allposts.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <br><br><strong>Name:</strong><br>
                {{ $data->name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <br><br><strong>industry_type:</strong><br>
                {{ $data->category_type }}
            </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <br><br><strong>industry_type:</strong><br>
                {{ $data->industry_type }}
            </div>
    </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <br><br><strong>description:</strong><br>
                {{ $data->description }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <img src="{{asset('/storage/app/'.$data->image)}}" alt="{{$data->title}}" style="width: 100px;">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Thumbnail:</strong>
                <img src="{{asset('/storage/app/'.$data->thumbnail)}}" alt="{{$data->title}}" style="width: 100px;">
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <br><br><strong>Caption:</strong><br>
                {{ $data->caption }}
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <br><br><strong>Start_date:</strong><br>
                {{ $data->start_date }}
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <br><br><strong>End_date:</strong><br>
                {{ $data->end_date }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <br><br><strong>Status:</strong><br>
                {{ $data->status }}
            </div>
        </div>

    </div>
</div>

</section>
@endsection