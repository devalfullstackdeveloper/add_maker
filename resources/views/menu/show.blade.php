@extends('layout.layout')
@section('content')
<section>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2 ">
                <h2>Details of Posts</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('menu.index') }}"> All Post</a>
            </div>
        </div>
    </div>

    <div >
        <form action="#" method="POST">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Post Title</strong>
                        <input value="{{$menu->title}}" type="text" name="title" class="form-control" placeholder="Post Title" readonly>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Menu Description</strong>
                        <textarea class="form-control" placeholder="menu Description" name="description" id="description" cols="100" rows="3" readonly>{{$menu->description}}</textarea>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Image</strong>
                        <div>
                        <img class="mt-2" src="{{asset('/storage/app/'.$menu->images)}}" width="300px">
                        </div>
                    </div>
                </div>
                <a href="{{route('menu.edit',$menu->id)}}" class="btn btn-success btn-icon-text mb-2 mb-md-0">
                        Edit Post
                    </a>
            </div>
        </form>
    </div>
</div>
</section>
@endsection 