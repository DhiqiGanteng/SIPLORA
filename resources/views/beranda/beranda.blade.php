<!doctype html>
<html lang="en" id="home">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="css/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <script type="text/javascript" src="css/js/bootstrap.min.js">
  </script>
  <link rel="stylesheet" href="css/beranda.css">
  <title>Homepage Siplora...</title>
</head>

<body>

  <nav class="navbar fixed-top navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand scroll" href="#home">SIPLORA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- bagian navbar adminpage -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="#lapor" class="nav-link scroll">Pelaporan</a>
        </li>
        <li class="nav-item">
          <a href="#lacak" class="nav-link scroll">Pelacakan</a>
        </li>
        <li class="nav-item">
          <a href="#statistik" class="nav-link scroll">Statistik</a>
        </li>
        <li class="nav-item">
          <a href="#tenntangkami" class="nav-link scroll">Tentang Kami</a>
        </li>
        <li class="nav-item">
          <a href="{{url('/login')}}" class="btn btn-danger">Admin</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- bagian jumbotron -->
 <section class="beranda" id="beranda">
    <div class="bgJumbotron">
      <div class="overlayJumbotron">

                        @if(\Session::has('alert'))
                          <div class="alertHome col-md-4 offset-md-4">
                            <div>{{Session::get('alert')}}</div>
                          </div>
                        @endif
        <h1> <span>Melaporkan</span> Lokasi Daerah Rawan Bencana Serta <br> <span> Melacak</span> dan <span>Melihat</span> Status Laporan </h1>
        <p>"Untuk membantu BNPB dan pemerintah dalam mengurangi serta mencegah dampak bencana yang ditimbulkan"</p>
      </div>
    </div>
  </section>

  <!-- bagian isi -->
  <section  id="lapor">
    <div class="contanier-fluid lapor">
      <div class="row">
        <div class="col-sm-6 haha">
        <div class="col-md-11 offset-md-1">
          <img src="../image/12.jpg" class="img-fluid lacakLapor" alt="">
        </div>
        </div>
      <div class="col-sm-6">
        <div class="col-md-10 offset-md-1">
        <h3 class="float-md-left">LAPOR LOKASI</h3>
        <p class="text-muted float-md-left">Digunakan oleh pelapor untuk melakukan pelaporan lokasi rawan bencana.

Proses pelaporan ini dilakukan secara online sehingga pelapor memerlukan koneksi internet.Pelapor nantinya akan mendapatkan kode untuk melacak dan melihat status laporan.
</p>
        <a href="{{url('/buatLaporan')}}" class="laporBtn float-md-left">LAPOR SEKARANG</a>
        </div>
      </div>
      </div>
    </div>
  </section>

  <!-- bagian lihat laporan -->
  <section  id="lacak">
    <div class="container-fluid lacak">
      <div class="row">
        <div class="col-lg-6">
                <div class="col-lg-10 offset-lg-2">
                  <h3 class="float-md-left">LACAK LAPORAN</h3>
                  <p class="text-muted float-md-left">Digunakan oleh pelapor untuk melacak laporan dan melihat status laporan yang sudah dikirim menggunakan kode laporan atau identitas yang sudah diisi oleh pelapor. </p>
            <a href="{{url('/lacakLaporan')}}" class="laporBtn float-md-left">LACAK SEKARANG</a>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="col-lg-11">
            <img src="../image/11.jpg" class="img-fluid lacakLapor" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- bagian statistik -->
<section id="statistik">
  <div class="container-fluid statistik">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="text-center">
          STATISTIK SIPLORA
        </h2>
        <div class="panel panel-default">
          <div class="panel-body">
            <div id="jml_tamu"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <!-- bagian tentang kami  -->
  <section class="tenntangkami" id="tenntangkami">
    <div class="overlay">
      <div class="row">
          <div class="col-sm-12">
            <h2 class="text-center ">Tentang Kami</h2>
            <p class="text-center">Sistem Pelaporan Lokasi Rawan Bencana</p>
          </div>
      </div>
    </div>
  </section>

  <div class="container-fluid aboutUs2">
    <div class="row">
      <div class="col-sm-12">
        <p class="text-center aboutUs2P">Sistem Pelaporan Lokasi Rawan Bencana (disingkat SIPLORA) adalah suatu sistem perangkat lunak yang digunakan sebagai wadah pelaporan lokasi rawan bencana oleh masyarakat yang dimana lokasinya tidak terpasang alat pendeteksi dini bencana oleh Badan Nasional Penanggulangan Bencana.
<br> SIPLORA dimaksudkan untuk membantu BNPB dalam memantau lokasi-lokasi rawan bencana di seluruh Indonesia. Masyarakat sangat diharapkan ikut aktif dalam mengggunakan sistem ini, sehingga BNPB bisa menangani dan mencegah bencana yang akan terjadi di lokasi-lokasi di Indonesia dengan lebih efektif dan efisien.</p>
      </div>
    </div>
  </div>

 <div class="containter-fluid aboutsUs3">
    <div class="row">
      <div class="col-sm-12">
          <h2 class="text-center ff">Tim Kami...</h2>
          <p class="col-sm-6 offset-sm-3 text-justify jj"></p>
          <div class="container">
            <div class="row">
            <div class="col-md-4 offset-md-2 ">
              <img src="image/artha.jpg" class="img-fluid artha" alt="">
              <h6>ARTHA DWINTA</h6>
              <p>“There will be obstacles. There will be doubters. There will be mistakes. But with hard work, there are no limits.”</p>
              <a href="#"><i class="fab fa-instagram "></i>Artha</a>
            </div>
            <div class="col-md-4 dendyy">
              <img src="image/20.jpg" class="img-fluid" alt="">
              <h6>DENDY SURYA DARMAWAN</h6>
              <p>"Optimism is the faith that leads to achievement. Nothing can be done without hope and confidence"</p>
              <a href="#"><i class="fab fa-instagram "></i>Dendy</a>
            </div>
            </div>
            <div class="row kolomBawah">
              <div class="col-md-4 offset-lg-2">
                <img src="image/18.jpg" class="img-fluid" alt="">
                <h6>Fatih  Assidhiqi</h6>
                <p>"Believe in yourself! Have faith in your abilities! Without a humble but reasonable confidence in your own powers you cannot be successful or happy."</p>
                <a href="#"><i class="fab fa-instagram "></i>Dhiqi</a>
              </div>
              <div class="col-md-4 sulu">
                <img src="image/sulu.jpg" class="img-fluid" alt="">
                <h6>Sulthon Zohri</h6>
                <p>“Do not wait; the time will never be ‘just right.’ Start where you stand, and work with whatever tools you may have at your command, and better tools will be found as you go along.”</p>
                <a href="#"><i class="fab fa-instagram "></i>Zohri</a>
              </div>
            </div>
            </div>
      </div>
    </div>
  </div>



  <!-- bagian footer -->
  <footer>
    <div class="row">
      <div class="col-sm-12">
        <p class="text-center"> &copy; Copyright 2018 | built by. <span>Avenger's Team</span> <br> Jalan Kaliurang Km. 14,5, Yogyakarta, Krawitan, Umbulmartani, Ngemplak, Kabupaten Sleman, <br> Daerah Istimewa Yogyakarta 55584 </p>
      </div>
    </div>
  </footer>





  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="js/jquery.easing.1.3.js">

  </script>
  <script type="text/javascript" src="js/beranda.js">

  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="highchart/code/highcharts.js"></script>
  <script type="text/javascript">
    $(function(){


      Highcharts.chart('jml_tamu', {
          chart: {
              type: 'column'
          },
          title: {
              text: 'Jumlah Data Laporan'
          },
          subtitle: {
              text: 'Per Daerah'
          },
          xAxis: {
              categories: {!! json_encode($data['category']) !!},
              crosshair: true
          },
          yAxis: {
              min: 0,
              title: {
                  text: 'Jumlah'
              }
          },
          tooltip: {
              headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
              pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                  '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
              footerFormat: '</table>',
              shared: true,
              useHTML: true
          },
          plotOptions: {
              column: {
                  pointPadding: 0.2,
                  borderWidth: 0
              }
          },
          series: {!! json_encode($data['series']) !!}
      });



    })
  </script>
</body>

</html>
