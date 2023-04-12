@extends('layout.layout')
@section('content')
<section>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Instagram Posts</h1>

        <a href="{{ route('iposts.create') }}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fa fa-plus" style="font-size:24px"></i>
                </span>
                <span class="text">Add New Post</span></a>
            </div>

            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"> List</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                    <th>Id</th>
                                    <th>Posts Title</th>
                                    <th>Posts description</th>
                                    <th>Posts Images</th>
                                    <th>Created At</th>
                                    <th width="280px">Action</th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                 <?php $i=1; 
                                   ?>
                              @foreach ($iposts as $po)
                               <tr>
                                <td>{{$i}}</td>
                                <td><div class="tect-desc">{{ $po->title}}</td></div>
                                <td><div class="tect-desc"> {{ $po->description }}</td></div>
                                <td><img alt="img" class="list-img" src="{{asset('/storage/app/'.$po->images)}}" width="100px"></td>
                                <td>{{ $po->created_at }}</td>
                                <td>
                                  <div class="action-wrap-btn">

                                   <a href="{{route('iposts.show', $po->id) }}" class="btn "><i class="fas fa-eye text-success"></i></a>

                                   <a href="{{route('iposts.edit', $po->id)}}" class="btn "><i class="fas fa-edit text-primary"></i></a>

                                   <form action="{{route('iposts.destroy',$po->id) }}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn  text-danger" type="submit"><i class="fas fa-trash"></i></button>
                                   </form> 
                                  </div>
                                </td>
                               </tr>
                                <?php $i++;?>
                              @endforeach
                                 </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>
<script src="{{asset('/public/site/js/jquery/jquery.min.js')}}"></script>
@endsection