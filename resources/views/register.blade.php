<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="styleadminPage.css">
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
          <a href="beranda.html" class="nav-link">Beranda</a>
        </li>

      </ul>
    </div>
  </nav>
  <!-- bagian form -->
  <div class="jumbotron jumbotron-fluid">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-4 offset-sm-4 aa shadow p-3 mb-5 bg-white rounded">
            <div class="row">
              <div class="col-sm-12 text-center">
                <h3>REGISTER ADMIN SIPLORA</h3>
              </div>
            </div>
            <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
           @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(\Session::has('alert'))
                <div class="alert alert-danger">
                    <div>{{Session::get('alert')}}</div>
                </div>
            @endif
            @if(\Session::has('alert-success'))
                <div class="alert alert-success">
                    <div>{{Session::get('alert-success')}}</div>
                </div>
            @endif
            <form action="{{ url('/registerPost') }}" method="post">
                {{ csrf_field() }}
            <div class="row">
              <div class="col-sm-10 offset-sm-1">
                <div class="form-group">
                    <label for="nama">Name:</label>
                    <input type="text"  class="form-control" id="nama" name="nama">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email"  class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="nohp">no Hp:</label>
                    <input type="nohp"  class="form-control" id="nohp" name="nohp">
                </div>
                <div class="form-group">
                    <label for="hak">Pemerintah :</label>
                    <input type="radio" id="hak" name="hak" value="BNPB" checked>BNPB</br>
                    <input type="radio" id="hak" name="hak" value="BDPB">BDPB</br>
                    <input type="radio" id="hak" name="hak" value="Dinas">Dinas</br>
                </div>
                <div class="form-group">
                    <label for="daerah">Daerah :</label>
                    <select class="form-control" id="daerah" name="daerah">
                      @foreach($datas as $datass)
                      <option value="{{$datass->id}}">{{$datass->name}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="username">username:</label>
                    <input type="username" class="form-control" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="password">Password Confirmation:</label>
                    <input type="password" class="form-control" id="confirmation" name="confirmation">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-8 offset-sm-2">
                    <button type="submit" class="btn btn-success btn-block">Daftar</button>
              </div>
            </div>
          </form>
        </div>
      </section>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-4 offset-sm-4">
            <p class="text-center footer"> &copy; Copyright 2018 | built by. Avenger </p>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script type="text/javascript">
    var a = document.getElementByName('hak');

    function pilihan(){
      if (a.value == 'BNPB') {
        return "$data"
      }esle {
        return "$data2"
      }
    }
  </script>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
