<!DOCTYPE html>
<html lang="en">

@include('layouts.admin.head')

@if(session()->has('error'))
<div class="alert alert-danger">
  {{ session()->get('error') }}
</div>
@endif

<body>
  @include('layouts.admin.navbar')
  <div class="subnavbar">
    <div class="subnavbar-inner">
      <div class="container">
        <ul class="mainnav">
          <li class="active"><a href=""><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
          <li><a href="{{url('allcalonsiswa')}}"><i class="icon-list-alt"></i><span>Calon Siswa</span> </a> </li>
          <li><a href="{{url('alluser')}}"><i class="icon-user"></i><span>Users</span> </a> </li>
          <li><a href="{{url('allsiswa')}}"><i class="icon-user"></i><span>Siswa</span> </a></li>
          <li><a href="{{url('konfirmasipembayaran')}}"><i class="icon-dollar"></i><span>Konfirmasi Pembayaran SPP</span> </a> </li>
          <li><a href="{{url('spp')}}"><i class="icon-dollar"></i><span>Daftar SPP</span> </a> </li>
        </ul>
      </div>
      <!-- /container -->
    </div>
    <!-- /subnavbar-inner -->
  </div>
  <!-- /subnavbar -->
  <div class="main">
    <div class="main-inner">
      <div class="container">
        <div class="row">
          <div class="span6">
            <div class="widget widget-nopad">
              <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3>Summary</h3>
              </div>
              <!-- /widget-header -->
              <div class="widget-content">
                <div class="widget big-stats-container">
                  <div class="widget-content">
                    <h6 class="bigstats">Total Data Sistem</h6>
                    <div id="big_stats" class="cf">
                      <div class="stat"> <i class="icon-list-alt"></i> <span class="value">{{DB::table('calon_siswas')->count()}}</span>
                        <p>Calon Siswa</p>
                      </div>
                      <!-- .stat -->

                      <div class="stat"> <i class="icon-user"></i> <span class="value">{{DB::table('users')->count()}}</span>
                        <p>Users</p>
                      </div>
                      <!-- .stat -->

                      <div class="stat"> <i class="icon-user"></i> <span class="value">{{DB::table('siswas')->count()}}</span>
                        <p>Siswa</p>
                      </div>
                      <!-- .stat -->

                      <div class="stat"> <i class="icon-dollar"></i> <span class="value">{{DB::table('bukti_pembayarans')->where('telah_dikonfirmasi', 0)->count()}}</span>
                        <p>Bukti Pembayaran Yang Harus Dikonfirmassi</p>
                      </div>
                      <!-- .stat -->
                    </div>
                  </div>
                  <!-- /widget-content -->

                </div>
              </div>
            </div>

          </div>
          <!-- /span6 -->
          <div class="span6">
            <!-- /widget -->
            <div class="widget">
              <div class="dropdown widget-header">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Pilih Tahun
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">2023</a>
                  <a class="dropdown-item" href="#">2022</a>
                  <a class="dropdown-item" href="#">2021</a>
                </div>
              </div>
              <!-- /widget-header -->
              <div class="widget-content">
                <canvas id="area-chart" class="chart-holder" height="250" width="538"> </canvas>
                <!-- /area-chart -->
              </div>
              <!-- /widget-content -->
            </div>
            <!-- /widget -->
            <!-- /span6 -->
          </div>
          <!-- /row -->
        </div>
        <!-- /container -->
      </div>
      <!-- /main-inner -->
    </div>
    <!-- /main -->
    <div id="user-ids" data-user-ids="{{ json_encode($monthlyData) }}"></div>


    @include('layouts.admin.footer')
    <!-- /footer -->
    <!-- Le javascript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    @include('layouts.admin.script')
    <script>
      Div = document.getElementById('user-ids');
      var userIds = JSON.parse(Div.dataset.userIds);
      console.log(userIds);
      var lineChartData = {
        labels: ['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'],
        datasets: [{
          fillColor: "rgba(151,187,205,0.5)",
          strokeColor: "rgba(220,220,220,1)",
          pointColor: "rgba(220,220,220,1)",
          pointStrokeColor: "#fff",
          data: [923839239, 89723987, 9173098192, 837982298, 9832798273, 982378923, 912387238, 981238927, 892382389, 982389738, 3298238973, 89239837]
        }]

      }

      var myLine = new Chart(document.getElementById("area-chart").getContext("2d")).Line(lineChartData);


      var barChartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,1)",
            data: [65, 59, 90, 81, 56, 55, 40]
          },
          {
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(151,187,205,1)",
            data: [28, 48, 40, 19, 96, 27, 100]
          }
        ]

      }

      $(document).ready(function() {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var calendar = $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          selectable: true,
          selectHelper: true,
          select: function(start, end, allDay) {
            var title = prompt('Event Title:');
            if (title) {
              calendar.fullCalendar('renderEvent', {
                  title: title,
                  start: start,
                  end: end,
                  allDay: allDay
                },
                true // make the event "stick"
              );
            }
            calendar.fullCalendar('unselect');
          },
          editable: true,
          events: [{
              title: 'All Day Event',
              start: new Date(y, m, 1)
            },
            {
              title: 'Long Event',
              start: new Date(y, m, d + 5),
              end: new Date(y, m, d + 7)
            },
            {
              id: 999,
              title: 'Repeating Event',
              start: new Date(y, m, d - 3, 16, 0),
              allDay: false
            },
            {
              id: 999,
              title: 'Repeating Event',
              start: new Date(y, m, d + 4, 16, 0),
              allDay: false
            },
            {
              title: 'Meeting',
              start: new Date(y, m, d, 10, 30),
              allDay: false
            },
            {
              title: 'Lunch',
              start: new Date(y, m, d, 12, 0),
              end: new Date(y, m, d, 14, 0),
              allDay: false
            },
            {
              title: 'Birthday Party',
              start: new Date(y, m, d + 1, 19, 0),
              end: new Date(y, m, d + 1, 22, 30),
              allDay: false
            },
            {
              title: 'EGrappler.com',
              start: new Date(y, m, 28),
              end: new Date(y, m, 29),
              url: 'http://EGrappler.com/'
            }
          ]
        });
      });
    </script><!-- /Calendar -->
</body>

</html>