@extends('layout.layout')


@section('content')
<section>
    <div class="container-fluid mt-2">
      
            <div class="page-title-wrap">
                <div class="title-wrap ">
                    <h2>Edit Your Category</h2>
                </div>
                <div class="button-wrap">
                    <a class="btn btn-primary" href="{{ route('category.index') }}">Back</a>
                </div>
            </div>
        

   
            <div class="card-body">

                @if ($errors->any())
                <div class="mt-2 alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

            </div>


                <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="edit-form-wrap">
                    <div class="row">
                        <input type="hidden" name="id" value="{{$category->id}}">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Category Title</strong>
                                <input value="{{$category->title}}" type="text" name="title" class="form-control"
                                    placeholder="Post Title">
                                @error('name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>    
                    

                       <div class="col-xs-12 col-sm-12 col-md-12 text-right mt-4">
                       <button type="submit" class="btn btn-primary ml-3">Update Post</button>
                      </div>
                    </div>
                </div>
               </form>
    </div>
</section>
@endsection
