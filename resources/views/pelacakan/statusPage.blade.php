<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/statusStyle.css">

    <title>Status Laporan</title>
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
            <a href="{{url('/')}}" class="nav-link">Beranda</a>
          </li>
          <li class="nav-item">
            <a href="{{url('/login')}}" class="btn btn-outline-danger">Admin</a>
          </li>
        </ul>
      </div>
    </nav>

     <!-- bagian form -->
  <div class="bg">
    <div class="overlay">
        <div class="row">
          <div class="col-10 offset-1">
            <div class="row">
              <div class="col-sm-12">
                <h2 class="text-center">Status Laporan</h2>
                <table class="table">
                  <thead>
                    <th scope="col">Kode</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tanggal</th>
                  </thead>
                  <tbody>
                    <tr>
                      <td>{{$data->kode_laporan}}</td>
                      <td>{{$data->status}}</td>
                      <td>{{$data->updated_at}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <a href="{{url('/lacakLaporan')}}" class="btn btnKembali btn-danger col-4 offset-4">Kembali</a>
          </div>
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
