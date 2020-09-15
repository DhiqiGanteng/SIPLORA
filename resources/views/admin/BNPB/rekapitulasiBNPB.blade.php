<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/css/bootstrap.css">
    <link rel="stylesheet" href="../css/rekapitulasiNasional.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>

    <title>Beranda BNPB</title>
  </head>
  <body>

      <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
          <div class="sidebar-header">
            <div class="col-md-12">
              <div class="list-profile">
                <div class="profile-header">
                <i class="fas fa-user-circle d-flex justify-content-center fa-5x text-center"></i>
                  <h5 class="text-center">{{Session::get('nama')}}</h5>
                  <h6 class="text-center">( {{Session::get('hak')}} )</h6>
                </div>
                <p><i class="fas fa-phone-square"></i> {{Session::get('nohp')}}</p>
                <p class="email"><i class="fas fa-envelope"></i>{{Session::get('email')}}</p>
                <p class="role"><i class="fas fa-city"></i>{{Session::get('daerah')}}</p>

                  </div>
            </div>
          </div>
          <div class="col-md-12 list-rute">
            <div class="list-group">
               <a href="{{url('/berandaBNPB')}}" class="list-group-item list-group-item-action ">
               <i class="fas fa-tachometer-alt"></i>  Dashboard
               </a>
               <a href="{{url('/berandaBNPB/manajement')}}" class="list-group-item list-group-item-action "> <i class="fas fa-cog"></i> Manajemen Laporan</a>
               <a href="{{url('/berandaBNPB/verifikasi')}}" class="list-group-item list-group-item-action "> <i class="fas fa-clipboard-check"></i> Verifikasi Laporan</a>
               <a href="{{url('/berandaBNPB/rekapitulasiBNPB')}}" class="list-group-item list-group-item-action active btnActive"> <i class="fas fa-clipboard-check"></i> Rekapitulasi</a>
             </div>
          </div>
          <div class="col-md-10 offset-md-1 btn-admin">
            <a href="{{url('/logout')}}" class="btn-block">LOG OUT</a>
          </div>

        </nav>

        <!-- Page Content  -->

        <!-- navbar -->
        <div id="content">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <div class="container-fluid">
                <div class="row">
                    <button type="button" id="sidebarCollapse" class="btn btn-outline-danger">
                        <i class="fas fa-align-left fa-lg"></i>
                          <!-- <span>SIPLORA</span> -->
                    </button>
                   <h4>Manajemen Admin BNPB</h4>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{url('/')}}">Homepage</a>
                        </li>
                    </ul>
                </div>
              </div>
          </nav>

              <div class="konfirmasi">
                  <div class="row">
                    <div class="col-sm-12 ">
                        <h1>Manajemen Laporan</h1>
                        @if(\Session::has('alert'))
                          <div class="alert alert-danger">
                            <div>{{Session::get('kode_laporan')}}{{Session::get('alert')}}</div>
                          </div>
                         @endif
                        @if(\Session::has('alert-success'))
                          <div class="alert alert-success">
                            <div>{{Session::get('kode_laporan')}}{{Session::get('alert-success')}}</div>
                          </div>
                        @endif
                        <table class="table"  id="haha">
                           <thead>
                             <tr>
                               <th scope="col"style="width: 13%" >Jenis Bencana</th>
                               <th scope="col"style="width: 30%">Lokasi Bencana</th>
                               <th scope="col">Tanggal</th>
                               <th scope="col">Status</th>
                               <th scope="col">Gambar</th>
                               <th scope="col">Action</th>
                             </tr>
                           </thead>
                           <tbody>
                              @foreach($data as $laporan)
                              <tr>
                                <td>{{$laporan->jenis_bencana}}</td>
                                <td>{{$laporan->get_province['name']}}, {{$laporan->get_regency['name']}}, {{$laporan->get_district['name']}},{{$laporan->get_village['name']}} </td>
                                <td>{{$laporan->updated_at}}</td>
                                <td>{{$laporan->status}}</td>
                                <td><img src="{{ asset('gambar/'.$laporan->foto)  }}"  style="width:50px;height:50px">
                                  </td>
                                <td>
                                    <div class="row">
                                      <!-- Button trigger modal -->
                                        <button type="button" data-jenis ="{{ $laporan->jenis_bencana }}" data-kodelaporan ="{{$laporan->kode_laporan}}" data-tanggal ="{{ $laporan->updated_at }}" data-deskripsi ="{{ $laporan->deskripsi }}" data-lokasi ="{{$laporan->get_province['name']}}, {{$laporan->get_regency['name']}}, {{$laporan->get_district['name']}},{{$laporan->get_village['name']}}" data-namapelapor ="{{ $laporan->get_pelapor['nama'] }}" data-nohp ="{{ $laporan->get_pelapor['nohp'] }}" data-email ="{{ $laporan->get_pelapor['email'] }}" data-pemerintah ="{{ $laporan->get_pemerintah['nama'] }}" data-foto ="{{ asset('gambar/'.$laporan->foto)  }}" data-status ="{{ $laporan->status }}"class="btn btn-outline-primary detail" data-toggle="modal" data-target="#exampleModalCenter" >
                                          <i class="fas fa-info-circle"></i>
                                        </button>
                                      </div>
                                </td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                    </div>

                  </div>
              </div>
        </div>
      </div>

  <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Detail Laporan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
          <tr>
              <th scope="col">Kode Laporan</th>
              <td>:</td>
              <td><div id="kodeLaporan"></div></td>
            </tr>
            <tr>
              <th scope="col">Status</th>
              <td>:</td>
              <td><div id="status"></div></td>
            </tr>
            <tr>
              <th scope="col">Jenis Bencana</th>
              <td>:</td>
              <td><div id="jenis"></div></td>
            </tr>
            <tr>
              <th scope="col">Tanggal</th>
              <td>:</td>
              <td><div id="tanggal"></div></td>
            </tr>
            <tr>
              <th scope="col">Deskripsi</th>
              <td>:</td>
              <td><div id="deskripsi"></div></td>
            </tr>
              <th scope="col">Lokasi</th>
              <td>:</td>
              <td><div id="lokasi"></div></td>
            <tr>
              <th scope="col">Nama Pelapor</th>
              <td>:</td>
              <td><div id="namaPelapor"></div></td>
            </tr>
            <tr>
              <th scope="col">Nomor Telepon</th>
              <td>:</td>
              <td><div id="nohp"></div></td>
            </tr>
            <tr>
              <th scope="col">Email Pelapor</th>
              <td>:</td>
              <td><div id="email"></div></td>
            </tr>
            <tr>
              <th scope="col">Updated by</th>
              <td>:</td>
              <td><div id="pemerintah"></div></td>
            </tr>
        </table>
        <h5>Foto Laporan</h5>
          <div class="gambarku">
              <div id="mygambar"></div>
          </div>
      </div>
    </div>
  </div>
</div>



      <!-- jQuery CDN - Slim version (=without AJAX) -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <!-- Bootstrap JS -->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
      <!-- jQuery Custom Scroller CDN -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>


            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.jqueryui.min.css"/>
          <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
          <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.jqueryui.min.js"></script>

          <script type="text/javascript">
          $(document).ready( function () {
          $('#haha').DataTable();
          } )
          </script>


      <script type="text/javascript">
        $(document).ready(function() {
          $("#sidebar").mCustomScrollbar({
            theme: "minimal"
          });

          $('#sidebarCollapse').on('click', function() {
            $('#sidebar, #content').toggleClass('active');
            $('.collapse.in').toggleClass('in');
          });
        });
      </script>
      <script>
        var myImage2 = new Image(300, 300);
      $('#exampleModalCenter').on('show.bs.modal', function (event){

          var button = $(event.relatedTarget)
          var jenis = document.getElementById("jenis");
          jenis.innerHTML = button.data('jenis');
          var kodeLaporan = document.getElementById("kodeLaporan");
          kodeLaporan.innerHTML = button.data('kodelaporan');
          var tanggal = document.getElementById("tanggal");
          tanggal.innerHTML = button.data('tanggal');
          var deskripsi = document.getElementById("deskripsi");
          deskripsi.innerHTML = button.data('deskripsi');
          var lokasi = document.getElementById("lokasi");
          lokasi.innerHTML = button.data('lokasi');
          var namaPelapor = document.getElementById("namaPelapor");
          namaPelapor.innerHTML = button.data('namapelapor');
          var nohp = document.getElementById("nohp");
          nohp.innerHTML = button.data('nohp');
          var email = document.getElementById("email");
          email.innerHTML = button.data('email');
          var pemerintah = document.getElementById("pemerintah");
          pemerintah.innerHTML = button.data('pemerintah');
          var status = document.getElementById("status");
          status.innerHTML = button.data('status');

            var myImage = myImage2;
            myImage.src = button.data('foto');
            x = document.getElementById("mygambar");
            x.appendChild(myImage);


      })
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>





  </body>
</html>
