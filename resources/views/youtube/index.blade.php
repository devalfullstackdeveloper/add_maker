@extends('layout.layout')



@section('content')
<section>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Youtube</h1>

            <a href="{{route('youtube.create')}}" class="btn btn-primary btn-icon-split">
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
                              @foreach ($youtube as $yo)
                               <tr>
                                <td>{{$i}}</td>
                                <td>{{ $yo->title }}</td>
                                <td>{{ $yo->description }}</td>
                                <td><img alt="img" src="{{asset('/storage/app/'.$yo->image)}}" width="100px"></td>
                                 <td>{{$yo->date }}</td>
                                <!-- <td>{{ $yo->status }}</td> -->
                                <td>
                                        <input data-id="{{$yo->id}}" class="toggle-class" type="checkbox"
                                            data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                            data-on="Active" data-off="Inactive" {{ $yo->status ? 'checked' : '' }}>
                                    </td>
                                <td>
                                  <div class="action-wrap-btn">

                                   <a href="{{route('youtube.show',$yo->id)}}" class="btn btn-success btn-circle"><i class="fas fa-eye"></i></a>

                                   <a href="{{route('youtube.edit',$yo->id)}}" class="btn btn-primary btn-circle"><i class="fas fa-edit"></i></a>

                                   <form action="{{route('youtube.destroy',$yo->id)}}" method="post" style="display: inline-block">
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
 
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
</script>
<script>
jQuery(document).ready(function() {
    jQuery('.toggle-class').change(function(e) {
        // e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var status = $(this).prop('checked') == true ? 1 : 0;
        var user_id = $(this).data('id');
        //   console.log(user_id);

        jQuery.ajax({
            method: 'post',
            dataType: "json",
            url: "{{ url('changeStatusYoutube') }}",
            data: {
                'status': status,
                'id': user_id
            },
            success: function(data) {
                console.log(data.success);
            }
        });
    });
});
</script>

@endsection
