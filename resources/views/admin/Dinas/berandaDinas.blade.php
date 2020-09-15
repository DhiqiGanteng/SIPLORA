<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/css/bootstrap.css">
    <link rel="stylesheet" href="../css/berandaDinas.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>

    <title>Beranda Dinas</title>
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
               <a href="{{url('/berandaDinas')}}" class="list-group-item list-group-item-action active btnActive">
               <i class="fas fa-tachometer-alt"></i>  Dashboard
               </a>
               <a href="{{url('/konfirmasiDinas')}}" class="list-group-item list-group-item-action konf">
               <i class="fas fa-clipboard-check"></i>  Konfirmasi Tindak Lanjut
               </a>
               <a href="{{url('/berandaDinas/rekapitulasiDinas')}}" class="list-group-item list-group-item-action "> <i class="fas fa-clipboard-check"></i> Rekapitulasi</a>
             </div>
          </div>
          <div class="col-md-10 offset-md-1 btn-admin">
            <a href="{{url('/logout')}}" class="  btn-block">LOG OUT</a>
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
                  <h4>Dashboard Dinas {{Session::get('daerah')}}</h4>
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

          <div class="row">
            <div class="col-sm-12 ">
              @if(\Session::has('alert'))
                <div class="alert alert-danger">
                    <div>{{Session::get('kode_laporan')}}{{Session::get('alert')}}</div>
                </div>
              @endif
              <div class="panel panel-default">
                  <div class="panel-body">
                    <div id="jml_tamu"></div>
                  </div>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="jquery-3.3.1.min.js">

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
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
              text: '{{Session::get('daerah')}}'
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
