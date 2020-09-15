<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/css/bootstrap.css">
  <link rel="stylesheet" href="css/styleadminPage.css">
  <title>Beranda Admin...</title>
</head>

<body>
  <nav class="navbar fixed-top navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="#">SIPLORA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- bagian navbar adminpage -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="{{ url('/') }}" class="nav-link">Dashboard</a>
        </li>

      </ul>
    </div>
  </nav>

  <!-- bagian form -->
  <div class="bg">
        <div class="row">
          <div class="col-md-8">

          </div>
          <div class="col-md-4">

            <div class="row">
              <div class="col-sm-12 text-center">
                <h3>LOGIN ADMIN SIPLORA</h3>
              </div>
            </div>
            <section class="main-section">
            <form action="{{ url('/loginPost') }}" method="post">
                {{ csrf_field() }}
            <div class="row">
              <div class="col-sm-12 ">
                <div class="form-group has-feedback has-feedback-left">
                  <input type="text" class="form-control" placeholder="Username" name="username" id="username" required>
                  <i class="form-control-feedback fas fa-user"></i>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                </div>
              </div>
            </div>
            <!-- Add Your Content Inside -->
            <div class="content">
                @if(\Session::has('alert'))
                    <div class="col-md-12  alert alert-danger">
                        <div>{{Session::get('alert')}}</div>
                    </div>
                @endif
                @if(\Session::has('alert-success'))
                    <div class="alert alert-success">
                        <div>{{Session::get('alert-success')}}</div>
                    </div>
                @endif

            <div class="row">
              <div class="col-sm-8 offset-sm-2">
                <button class="btn btn-success btn-block" href="#" type="submit">LOGIN</button>
              </div>
            </div>
          </form>
            <div class="row">
              <div class="col-10 offset-1">
                <p class="text-center footer"> &copy; Copyright 2018 | built by. Avenger </p>
              </div>
            </div>
        </div>
      </section>
    </div>
        </div>
      </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
