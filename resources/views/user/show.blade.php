@extends('layout.layout')



@section('content')
<section> 
<div class="container mt-2">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Data</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('user.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <br><br><strong>NamePrefix:</strong>
                {{ $data->namePrefix }}
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <br><br><strong>FirstName:</strong>
                {{ $data->firstname }}
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <br><br><strong>LastName:</strong>
                {{ $data->lastname }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <br><br><strong>MiddleName:</strong>
                {{ $data->middlename }}
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <br><br><strong>Nickname:</strong>
                {{ $data->nickname }}
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <br><br><strong>NameSuffix:</strong>
                {{ $data->nameSuffix }}
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <br><br><strong>Email:</strong>
                {{ $data->email  }}
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <br><br><strong>is_admin:</strong>
                {{ $data->is_admin }}
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <br><br><strong>MobileNo:</strong>
                {{ $data->mobileno  }}
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <br><br><strong>Google Id:</strong>
                {{ $data->google_id }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <br><br><strong>Facebook Id:</strong>
                {{ $data->facebook_id }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <br><br><strong>Instagram Id:</strong>
                {{ $data->instagram_id }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <br><br><strong>Apple Id:</strong>
                {{ $data->apple_id }}
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <br><br><strong>Login Id:</strong>
                {{ $data->login_id }}
            </div>
        </div>

    </div>
</div>

</section>
@endsection