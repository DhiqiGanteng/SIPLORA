<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/pelacakan1style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>Pelacakan</title>
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

    <!-- bagian isi -->
    <div class="pelacakan1">
      <div class="jumbotron jumbotron-fluid">
        <div class="row">
          <div class="col-10 offset-1">
            <h2 class="text-center">LACAK LAPORAN ANDA</h2>
             <div class="text-center">
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
            </div>
            <div class="row">
              <div class="col-sm-6 garis">
                <h6 class="text-center">LACAK DENGAN KODE LAPORAN</h6>
                <form action="{{ url('lacakLaporan/lacakLaporan_kode') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="col-sm-8 offset-sm-2">
                    <label for="">Kode Laporan</label>
                    <input type="text" name="kode_laporan" class="form-control" required>
                    <small class="form-text text-muted text-center"><i class="fas fa-info-circle fa-lg"></i>Masukkan Kode Laporan yang anda dapatkan saat selesai melakukan laporan</small>
                    <small class="form-text text-muted text-center"><i class="fas fa-info-circle fa-lg"></i>Boleh Tidak Diisi</small>
                    <br>
                    <button type="submit" class="btn btn-danger btn-block">LACAK KODE</button>
                    <hr>
                  </div>
                </form>
              </div>
              <div class="col-sm-6">
                <h6 class="text-center">LACAK DENGAN NAMA DAN NOMOR TELEPON</h6>
                <form action="{{ url('lacakLaporan/lacakLaporan_nama') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="col-sm-8 offset-sm-2">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="nama" required>
                    <label for="">Nomor Telepon</label>
                    <input type="phone" class="form-control" name="nohp" required>
                    <small class="form-text text-muted text-center"><i class="fas fa-info-circle fa-lg"></i>Masukkan nama dan nomor telepon yang anda gunakan saat melakukan pelaporan</small>
                    <br>
                    <button type="submit" name="button" class="btn btn-block btn-danger">LACAK SEKARANG</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h2>LACAK DENGAN KODE LAPORAN</h2>
          <form class="" action="{{url('statusPage')}}" method="post">
            <label for="">Kode Laporan</label>
            <input type="text" class="form-control" >
            <small class="form-text text-muted text-center"><i class="fas fa-info-circle fa-lg"></i>Masukkan Kode Laporan yang anda dapatkan saat selesai melakukan laporan</small>
            <small class="form-text text-muted text-center"><i class="fas fa-info-circle fa-lg"></i>Boleh Tidak Diisi</small>
            <hr>
            <h2>LACAK DENGAN NAMA DAN NOMOR TELEPON</h2>
            <label for="">Nama</label>
            <input type="text" class="form-control">
            <label for="">Nomor Telepon</label>
            <input type="phone" class="form-control">
            <small class="form-text text-muted text-center"><i class="fas fa-info-circle fa-lg"></i>Masukkan nama dan nomor telepon yang anda gunakan saat melakukan pelaporan</small>
            <button type="submit" name="submit" class="btn btn-primary">LACAK</button>
          </form>
        </div>

      </div>
    </div> -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
