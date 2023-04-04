@extends('layout.layout')


@section('content')
<section>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2 ">
                <h2>Details of Post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('iposts.index') }}"> All Post</a>
            </div>
        </div>
    </div>

    <div >
        <form action="#" method="POST">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Post Title</strong>
                        <input value="{{$ipost->title}}" type="text" name="title" class="form-control" placeholder="Post Title">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Post Description</strong>
                        <textarea class="form-control" placeholder="Post Description" name="description" id="description" cols="100" rows="3">{{$ipost->description}}</textarea>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Images</strong>
                            <input type="file" name="images" class="form-control" placeholder="Uplpoad Images">
                            <img alt="img" src="{{asset('/storage/app/'.$ipost->images)}}" width="100px">
                    </div>
                </div>
                <a href="{{route('iposts.edit',$ipost->id)}}" class="btn btn-success btn-icon-text mb-2 mb-md-0">
                        Edit Post
                    </a>
            </div>
        </form>
    </div>
</div>
</section>
@endsection
