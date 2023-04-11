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
                <a class="btn btn-primary" href="{{ route('user.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <form action="{{ route('user.update',$data->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
       
     
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NamePrefix:</strong>
                    <input type="text" name="namePrefix" value="{{ $data->namePrefix}}" class="form-control">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" name="firstname" value="{{ $data->firstname}}" class="form-control">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Last Name:</strong>
                    <input type="text" name="lastname" value="{{ $data->lastname}}" class="form-control">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Middle Name:</strong>
                    <input type="text" name="middlename" value="{{ $data->middlename}}" class="form-control">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nick Name:</strong>
                    <input type="text" name="nickname" value="{{ $data->nickname}}" class="form-control">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name Suffix:</strong>
                    <input type="text" name="nameSuffix" value="{{ $data->nameSuffix}}" class="form-control" >
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" value="{{ $data->email}}" class="form-control" >
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Mobile No:</strong>
                    <input type="text" name="mobileno" value="{{ $data->mobileno }}" class="form-control" >
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Google Id:</strong>
                    <input type="email" name="google_id" value="{{ $data->google_id}}" class="form-control" >
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Facebook Id:</strong>
                    <input type="text" name="facebook_id" value="{{ $data->facebook_id}}" class="form-control">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Instagram Id:</strong>
                    <input type="text" name="instagram_id" value="{{ $data->instagram_id}}" class="form-control">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Apple Id:</strong>
                    <input type="text" name="apple_id" value="{{ $data->apple_id}}" class="form-control">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
     
    </form>

</section>
@endsection
