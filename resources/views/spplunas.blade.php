<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="{{ asset('images/logo.ico') }}" type="image/x-icon">
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SMP Darul Ulum Surabaya</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <style>
        #myPanzoom {
            max-width: 600px;
            height: 400px;
            background: #eee;
        }
    </style>
</head>
<!-- body -->

<body class="main-layout inner_page">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Sistem Pembayaran SPP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('pembayaranspp')}}">Tagihan <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('spplunas')}}">SPP Lunas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('buktipembayaran')}}">Menunggu Dikonfirmasi</a>
                    </li>
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end header inner -->
    <!-- contact -->
    @if(session()->has('message'))
    <div class="alert alert-success alert-float">
        {{ session()->get('message') }}
    </div>
    @endif
    @if(count($spp)>0)
    <br>
    <br>
    <div class="titlepage text_align_center">
        <h2>Daftar <span class="blue_light">Spp Lunas<span></h2>
    </div>
    <div class="form-step margin-core-status">
        <div class="content-status-pendaftaran">
            <div class="">
                <table class="table" id="myTable">
                    <thead>
                        <tr class="table-top">
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal SPP Dikonfirmasi Lunas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($spp)>0)
                        @foreach($spp as $spps)
                        <tr>
                            <td>SPP bulan
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
                                {{$spps->tahun}}
                            </td>
                            <td>{{$spps->updated_at}}</td>
                        </tr>
                        @endforeach
                        @else
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- contact -->=
    @else
    <br>
    <br>
    <div class="titlepage text_align_center">
        <h2>Daftar Tagihan <span class="blue_light">Spp Lunas<span></h2>
    </div>
    <div class="form-step">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="text_align_center">
                        <h2>Tidak Ada Daftar Tagihan Lunas</h2>
                        <br>
                        <a class="button" href="/">Kembali Keberanda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact -->=
    @endif
    <!--  footer -->
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="infoma text_align_left">
                            <h3>Lokasi</h3>
                            <ul class="commodo">
                                <div id="map" style="width: 200px; height: 200px;"></div>

                                <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>

                                <script>
                                    function initMap() {
                                        // Inisialisasi peta dengan koordinat dan opsi yang sesuai
                                        var map = new google.maps.Map(document.getElementById('map'), {
                                            center: {
                                                lat: -7.255625605978664,
                                                lng: 112.66487353761738
                                            },
                                            zoom: 12
                                        });

                                        // Tambahkan marker ke peta
                                        var marker = new google.maps.Marker({
                                            position: {
                                                lat: -7.255625605978664,
                                                lng: 112.66487353761738
                                            },
                                            map: map,
                                            title: 'Lokasi'
                                        });
                                    }
                                </script>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="infoma">
                            <h3>Kontak Kami</h3>
                            <ul class="conta">
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i>Address : Jl. Raya Manukan Kulon No.98-100, RW.10, Manukan Kulon, Kec. Tandes, Surabaya, Jawa Timur
                                </li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i>Call : (031) 7417749</li>
                                <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="Javascript:void(0)"> Email : smpdu.muncar@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="infoma">
                            <h3>Service.</h3>
                            <ul class="menu_footer">
                                <li><a href="{{url('formpendaftaran')}}">Pendaftaran Peserta Didik Baru</a></li>
                                <li><a href="{{url('pembayaranspp')}}">Pembayaran SPP</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <!-- sidebar -->
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('js/form.js')}}"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>