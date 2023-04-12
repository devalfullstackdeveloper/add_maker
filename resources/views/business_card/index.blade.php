@extends('layout.layout')



@section('content')
<section>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Bussiness_card</h1>

            <a href="{{ route('bcard.create') }}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fa fa-plus"></i>
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
                                @foreach ($business_card as $business_card)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>
                                        <div class="tect-desc">{{ $business_card->description }}</div>
                                    </td>

                                    <td><img alt="img" class="list-img"
                                            src="{{asset('/storage/app/'.$business_card->image)}}"></td>
                                    <td>
                                        <div class="date-wrap">{{ $business_card->date }}</div>
                                    </td>
                                    <!-- <td>{{ $business_card->status }}</td> -->
                                    <td>
                                        <input data-id="{{$business_card->id}}" class="toggle-class" type="checkbox"
                                            data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                            data-on="Active" data-off="Inactive" {{ $business_card->status ? 'checked' : '' }}>
                                    </td>
                                  <td>
                                        <div class="action-wrap-btn">

                                            <a href="{{ route('bcard.show',$business_card->id) }}" class="btn"><i
                                                    class="fas fa-eye text-success"></i></a>

                                            <a href="{{ route('bcard.edit',$business_card->id) }}" class="btn"><i
                                                    class="fas fa-edit text-primary"></i></a>

                                            <form action="{{ route('bcard.destroy', $business_card->id)}}" method="post"
                                                style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn" type="submit"><i
                                                        class="fas fa-trash text-danger"></i></button>
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
            url: "{{ url('changeStatusBcard') }}",
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