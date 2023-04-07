@extends('layout.layout')



@section('content')
<section>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">

            <h1 class="h3 mb-0 text-gray-800">All Posts</h1>

            <a href="{{route('allposts.create')}}" class="btn btn-primary btn-icon-split">

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
                                    <th>Name</th>
                                    <th>industry_type</th>
                                    <th>description</th>
                                    <th>image</th>
                                    <th>thumbnail</th>
                                    <th>caption</th>
                                    <th>start_date</th>
                                    <th>end_date</th>
                                    <th>status</th>

                                    <th width="280px">Action</th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                 <?php $i=1; 

                                   ?> 
                              @foreach ($all_posts as $ap)
                               <tr>
                                <td>{{$i}}</td>
                                <td>{{ $ap->name }}</td>
                                <td>{{ $ap->industry_type }}</td>
                                <td>{{ $ap->description }}</td>
                                <td><img alt="img" src="{{asset('/storage/app/'.$ap->image)}}" width="100px"></td>
                                 <td><img alt="img" src="{{asset('/storage/app/'.$ap->thumbnail)}}" width="100px"></td>
                                 <td>{{ $ap->caption }}</td>
                                 <td>{{ $ap->start_date }}</td>
                                 <td>{{ $ap->end_date }}</td>
                                <td>{{ $ap->status }}</td>
                                <td>
                                  <div class="action-wrap-btn">

                                   <a href="{{route('allposts.show',$ap->id)}}" class="btn btn-success btn-circle"><i class="fas fa-eye"></i></a>

                                   <a href="{{route('allposts.edit',$ap->id)}}" class="btn btn-primary btn-circle"><i class="fas fa-edit"></i></a>

                                   <form action="{{route('allposts.destroy',$ap->id)}}" method="post" style="display: inline-block">

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
