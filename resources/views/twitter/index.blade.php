@extends('layout.layout')



@section('content')
<section>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Twitter</h1>

            <a href="{{route('twitter.create')}}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fa fa-plus" style="font-size:24px"></i>
                </span>
                <span class="text">Add Type</span></a>
            </div>
            <div class="container-fluid">
                <!-- DataTales Example -->
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
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th width="280px">Action</th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                 <?php $i=1; 
                                   ?>
                              @foreach ($twitter as $tw)
                               <tr>
                                <td>{{$i}}</td>
                                <td>{{ $tw->title }}</td>
                                <td>{{ $tw->description }}</td>
                                <td><img alt="img" src="{{asset('/public/twitter_img/'.$tw->image)}}" width="100px"></td>
                                 <!-- <td><img src="{{asset($tw->image)}}" alt="{{ $tw->title}}" style="width: 100px;"></td> -->
                                <!-- <td><img src="{{asset($tw->image)}}" alt="{{$tw->title}}" style="width: 100px;"></td> -->
                                 <td>{{$tw->date }}</td>
                                <td>{{ $tw->status }}</td>
                                <td>
                                  <div class="action-wrap-btn">

                                   <a href="{{route('twitter.show',$tw->id)}}" class="btn btn-success btn-circle"><i class="fas fa-eye"></i></a>

                                   <a href="{{route('twitter.edit',$tw->id)}}" class="btn btn-primary btn-circle"><i class="fas fa-edit"></i></a>

                                   <form action="{{route('twitter.destroy',$tw->id)}}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i></button>
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
