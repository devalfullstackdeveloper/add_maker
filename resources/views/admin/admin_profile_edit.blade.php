@extends('layout.layout')
@section('content')
<section>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2 ">
                <h2>Edit Your Profile</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.profile') }}"> Back</a>
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
    <form action="{{route('store.profile')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- @method('PUT') -->
            <div class="row">
            <input type="hidden" name="id" value="{{$editData->id}}">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>First Name</strong>
                        <input value="{{$editData->firstname}}" type="text" name="firstname" class="form-control">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Last Name</strong>
                        <input value="{{$editData->lastname}}" type="text" name="lastname" class="form-control">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email</strong>
                        <input value="{{$editData->email}}" type="email" name="email" class="form-control">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-- <input type="submit" class="btn btn-primary ml-3" value="Upadte Profile"> -->
                <button type="submit" class="btn btn-primary ml-3">Update Profile</button>
        </div>
    </form>
</div>
</section>
@endsection