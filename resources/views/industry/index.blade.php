@extends('layout.layout')



@section('content')

<section>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Industry</h1>

            <a href="{{ route('industry.create') }}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fa fa-plus"></i>
                </span>
                <span class="text">Add Industry Type</span></a>
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
                                    <th>Industry_type</th>
                                    <th>Description</th>
                                    <th>Industry_Image</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i=1; 
                                   ?>
                                @foreach ($industry as $indus)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>
                                        <div class="tect-desc">{{ $indus->industry_type }}</div>
                                    </td>
                                    <td>
                                        <div class="tect-desc">{{ $indus->description }}</div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{asset('/storage/app/'.$indus->industry_image)}}"
                                                class="list-img" alt="{{$indus->industry_type}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="action-wrap-btn">

                                            <a href="{{ route('industry.show',$indus->id) }}"
                                                class="btn"><i class="fas fa-eye text-success"></i></a>

                                            <a href="{{ route('industry.edit',$indus->id) }}"
                                                class="btn"><i class="fas fa-edit text-primary"></i></a>

                                            <form action="{{ route('industry.destroy', $indus->id)}}" method="post"
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

@endsection
