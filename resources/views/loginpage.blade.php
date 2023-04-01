<!DOCTYPE html>

<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
</head>
<body>

<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Log in</h3>

            <div class="form-outline mb-4">
              <input type="tel" id="typephnoX-2" class="form-control form-control-lg" placeholder="enter mobile number"/>
              <label class="form-label" for="typephnoX-2">Mobile Number</label>
            </div>


            <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>

            <hr class="my-4">

            <a href="{{ url('auth/google')}}"><button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
              type="submit">Sign in with google</button></a>
            <a href="{{ url('auth/facebook')}}"><button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;"
              type="submit">Sign in with facebook</button></a>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</body>


</html>