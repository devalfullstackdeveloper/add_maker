@extends('layout.layout')

@section('content')
<section>
    <div class="container-fluid mt-2">
        <div class="page-title-wrap">
            <div class="title-wrap">
                <h2>Edit Data</h2>
            </div>
            <div class="button-wrap">
                <a class="btn btn-primary" href="{{ route('bcard.index') }}"> Back</a>
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

        <form action="{{ route('bcard.update',$data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="edit-form-wrap">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Description:</strong>
                            <input type="text" name="description" value="{{ $data->description }}" class="form-control"
                                placeholder="Description">
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Image:</strong>
                            <input type="file" name="image" class="form-control" placeholder="image">
                            <input type="hidden" name="hidden_bcard_image" class="form-control"
                                placeholder="Business Card Image" value="{{$data->image}}">
                            <img class="list-img" src="{{asset('/storage/app/'.$data->image)}}" alt="{{$data->description}}">
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Date:</strong>
                            <input type="date" name="date" value="{{ $data->date }}" class="form-control"
                                placeholder="date">
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Status:</strong>
                            <input type="text" name="status" value="{{ $data->status }}" class="form-control"
                                placeholder="status">
                            @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 text-right mt-4">
                        <button type="submit" class="btn btn-primary ml-3">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection