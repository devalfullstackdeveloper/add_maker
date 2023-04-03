@extends('layout.layout')



@section('content')
<section>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Upcoming Events</h1>

            <a href="{{route('event.create')}}" class="btn btn-primary btn-icon-split">
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
                                    <th>Icon</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th width="280px">Action</th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                 <?php $i=1; 
                                   ?>
                              @foreach ($upcomingevents as $up)
                               <tr>
                                <td>{{$i}}</td>
                                <td>{{ $up->title }}</td>
                                <td>{{ $up->description }}</td>
                                <td><img alt="img" src="{{asset('/public/event_image/'.$up->icon)}}" width="100px"></td>
                                <!-- <td><img src="{{asset($up->p3)}}" alt="{{ $up->title}}" style="width: 100px;"></td> -->
                                 <td>{{$up->date }}</td>
                                <td>{{ $up->status }}</td>
                                <td>
                                  <div class="action-wrap-btn">

                                   <a href="{{route('event.show',$up->id)}}" class="btn btn-success btn-circle"><i class="fas fa-eye"></i></a>

                                   <a href="{{route('event.edit',$up->id)}}" class="btn btn-primary btn-circle"><i class="fas fa-edit"></i></a>

                                   <form action="{{route('event.destroy',$up->id)}}" method="post" style="display: inline-block">
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
