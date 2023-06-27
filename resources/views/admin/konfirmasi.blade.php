<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="{{ asset('images/logo.ico') }}" type="image/x-icon">
    <meta charset="utf-8">
    <title>SMP Darul Ulum Surabaya Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="{{asset('admin/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/pages/dashboard.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/panzoom/panzoom.css" />
    <style>
        #myPanzoom {
            max-width: 600px;
            height: 400px;
            background: #eee;
        }
    </style>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
    @include('layouts.admin.navbar')
    <div class="subnavbar">
        <div class="subnavbar-inner">
            <div class="container">
                <ul class="mainnav">
                    <li><a href="dashboard"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
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

    <div class="container">
        <h2>Konfirmasi Pembayaran Dari <span style="color: cadetblue;">{{$spp[0]->nama}}</span></h2>
        <p>*centang pada bulan yang ingin ditandai telah lunas</p>
        <form method="POST" id="edit-profile" class="form-horizontal" action="{{route('konfirmasi')}}">
            <div style="display: flex;
                        align-items: center;
                        justify-content: center;">
                <div style="flex: 1;
                        padding: 20px;">
                    <div class="tab-pane" id="formcontrols">
                        @csrf
                        <input type="hidden" name="id_bukti" value="{{$spp[0]->id_bukti}}">
                        @foreach ($spp as $spps)
                        <input type="checkbox" id="vehicle1" name="id{{$loop->iteration}}" value="{{$spps->id}}">
                        <label for="vehicle1">Rp. <b>{{$spps->nominal}}</b> SPP bulan
                            @if($spps->bulan=="1")
                            januari
                            @elseif($spps->bulan=="2")
                            februari
                            @elseif($spps->bulan=="3")
                            maret
                            @elseif($spps->bulan=="4")
                            april
                            @elseif($spps->bulan=="5")
                            mei
                            @elseif($spps->bulan=="6")
                            juni
                            @elseif($spps->bulan=="7")
                            juli
                            @elseif($spps->bulan=="8")
                            agustus
                            @elseif($spps->bulan=="9")
                            september
                            @elseif($spps->bulan=="10")
                            oktober
                            @elseif($spps->bulan=="11")
                            november
                            @else
                            desember
                            @endif
                            {{$spps->tahun}}</label><br>
                        @endforeach
                    </div>
                </div>
                <div style="flex: 1;
                text-align: center;">
                    <div class="f-panzoom" id="myPanzoom">
                        <img class="f-panzoom__content" src="{{asset('bukti_pembayaran_spp/'. $spp[0]->bukti_pembayaran)}}" />
                    </div>
                </div>
            </div>
            <fieldset>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Konfirmasi') }}
                    </button>
                    <a class="btn" href="{{route('konfirmasiPembayaranSpp')}}">Cancel</a>
                </div> <!-- /form-actions -->
            </fieldset>
        </form>

    </div>


    @include('layouts.admin.footer')
    <!-- Le javascript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    @include('layouts.admin.script')

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/panzoom/panzoom.umd.js"></script>
    <script>
        const container = document.getElementById("myPanzoom");
        const options = {
            click: "toggleCover"
        };

        new Panzoom(container, options);
    </script>
    </script>
</body>

</html>