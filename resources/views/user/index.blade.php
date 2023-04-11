@extends('layout.layout')

@section('content')
<section>
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users</h1>

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
                                    <th>namePrefix</th>
                                    <th>firstname</th>
                                    <th>lastname</th>
                                    <th>middlename</th>
                                    <th>nickname</th>
                                    <th>nameSuffix</th>
                                    <th>email</th>
                                    <th>is_admin</th>
                                    <th>mobileno</th>
                                    <th>google_id</th>
                                    <th>facebook_id</th>
                                    <th>instagram_id</th>
                                    <th>apple_id</th>
                                    <th>login_id</th>

                                    <th width="280px">Action</th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                 <?php $i=1; 
                                   ?>
                              @foreach ($user as $user)
                               <tr>
                                <td>{{$i}}</td>
                                <td>{{ $user->namePrefix }}</td>
                                <td>{{ $user->firstname }}</td>
                                <td>{{ $user->lastname }}</td>
                                <td>{{ $user->middlename }}</td>
                                <td>{{ $user->nickname }}</td>
                                <td>{{ $user->nameSuffix }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->is_admin }}</td>
                                <td>{{ $user->mobileno }}</td>
                                <td>{{ $user->google_id }}</td>
                                <td>{{ $user->facebook_id }}</td>
                                <td>{{ $user->instagram_id }}</td>
                                <td>{{ $user->apple_id }}</td>
                                <td>{{ $user->login_id }}</td>
                                <td>
                                  <div class="action-wrap-btn">

                                   <a href="{{route('user.show',$user->id)}}" class="btn btn-success btn-circle"><i class="fas fa-eye"></i></a>

                                   <a href="{{ route('user.edit',$user->id) }}" class="btn btn-primary btn-circle"><i class="fas fa-edit"></i></a>

                                   <form action="{{ route('user.destroy',$user->id) }}" method="post" style="display: inline-block">
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
