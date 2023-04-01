<!DOCTYPE html>

<html>

<head>

    <title>Laravel 5.8 Login with Google Account Example</title>

</head>

<body>

    <div class="container">

       <div class="row">

       <div class="col-md-12 row-block">

       <a href=""  class=”btn bth-lg-primaty btn-block ”>

          <strong>Login</strong>

          </a> 

<br><br>

<a href="{{ url('auth/google')}}"  class=”btn bth-lg-primaty btn-block ”>

          <strong>Login With Google</strong>

          </a> 

<br><br>

<a href="{{ url('auth/insta')}}"  class=”btn bth-lg-primaty btn-block ”>

          <strong>Login With Instagram</strong>

          </a> 
<br><br>

<a href="{{ url('auth/apple')}}"  class=”btn bth-lg-primaty btn-block ”>

          <strong>Login With Apple</strong>

          </a> 

         </div>

       </div>

    </div>

</body>

</html>