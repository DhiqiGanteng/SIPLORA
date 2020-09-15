<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/css/bootstrap.css">
  <link rel="stylesheet" href="css/pelaporan2style.css">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <title>Pelaporan 2</title>
</head>

<body>
  <!-- bagian navbar -->
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
  <section class="main-section">
    <div class="jumbotron jumbotron-fluid">
      <div class="row">
        <div class="col-10 offset-1">
          <div class="row">
            <div class="col-sm-12">
              <h2>Pelaporan Lokasi Rawan Bencana</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-8">
              <div class="col-sm-12">
                <h6>1. INFORMASI BENCANA</h6>
                <form action="/lapor" method="POST" enctype="multipart/form-data">
                  {!! csrf_field() !!}
                @if(\Session::has('alert'))
                <div class="alert alert-danger">
                    <div>{{Session::get('alert')}}</div>
                </div>
                @endif
                @if(\Session::has('alert-success'))
                <div class="alert alert-success">
                    <div>{{Session::get('alert-success')}} {{Session::get('kode_laporan')}}</div>
                </div>
                @endif
                <div class="form-group">
                  <label>Jenis Bencana</label>
                  <input type="text" class="form-control" name="jenis_bencana">
                </div>
                <div class="row">
                  <div class="form-group col-sm-6">
                    <label>Provinsi</label>
                       {!! Form::select('id_province',[''=>'--- Pilih Provinsi ---']+$provinces,null,['class'=>'form-control','required']) !!}
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Kabupaten/Kota</label>
                      {!! Form::select('id_regencies',[''=>'--- Pilih Kabupaten/Kota ---'],null,['class'=>'form-control','required']) !!}
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-6">
                    <label>Kecamatan</label>
                      {!! Form::select('id_districts',[''=>'--- Pilih Kecamatan ---'],null,['class'=>'form-control','required']) !!}
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Kelurahan</label>
                      {!! Form::select('id_villages',[''=>'--- Pilih Desa ---'],null,['class'=>'form-control','required']) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label>Deskripsi Laporan</label>
                  <textarea class="form-control" rows="3" name="deskripsi"></textarea>
                </div>
                <div class="form-group">
                  <label>Foto Lokasi(Opsional)</label> <br>
                  <img src="http://placehold.it/100x100" id="showgambar" style="max-width:200px;max-height:200px;float:left;" />

                  <input type="file" class="form-control-file" name="gambar" id="inputgambar" multiple="true" required>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="col-sm-12">
                <h6>2. DATA DIRI</h6>
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control" name="nama" required>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                  <label>Nomor Telepon</label>
                  <input type="phone" class="form-control" name="nohp">
                </div>
                <button type="submit" class="btn btn-danger btn-block" onclick="msg()">LAPOR</button>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script type="text/javascript">

      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputgambar").change(function () {
        readURL(this);
    });

</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

  <script type="text/javascript">
    $("select[name='id_province']").change(function(){
        var id_province = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "<?php echo route('select-ajax') ?>",
            method: 'POST',
            data: {id_province:id_province, _token:token},
            success: function(data) {
              $("select[name='id_regencies'").html('');
              $("select[name='id_regencies'").html(data.options);
            }
        });
    });
    $("select[name='id_regencies']").change(function(){
        var id_regencies = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "<?php echo route('select-ajax') ?>",
            method: 'POST',
            data: {id_regencies:id_regencies, _token:token},
            success: function(data) {
              $("select[name='id_districts'").html('');
              $("select[name='id_districts'").html(data.options);
            }
        });
    });
    $("select[name='id_districts']").change(function(){
        var id_districts = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "<?php echo route('select-ajax') ?>",
            method: 'POST',
            data: {id_districts:id_districts, _token:token},
            success: function(data) {
              $("select[name='id_villages'").html('');
              $("select[name='id_villages'").html(data.options);
            }
        });
    });
</script>
</body>

</html>
