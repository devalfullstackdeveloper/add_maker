@extends('layout.layout')
@section('content')
<section> 
<div class="container mt-2">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Admin Details</h2>
            </div>
            <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('edit.profile') }}"> Edit Profile</a>
                
            </div>
        </div>
    </div>
   
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <br><br><strong>First Name:</strong><br>
            {{$adminData->firstname}}
            </div> 
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <br><br><strong>Last name:</strong><br>
            {{$adminData->lastname}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <br><br><strong>Email Id:</strong><br>
            {{$adminData->email}}
            </div>
        </div>

        
    </div> 
</div>

</section>
@endsection