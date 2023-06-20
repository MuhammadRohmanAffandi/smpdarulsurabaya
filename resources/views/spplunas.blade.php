<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SMP Darul Ulum Surabaya</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
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
                <table class="table">
                    <thead>
                        <tr class="table-top">
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tanggal SPP Dikonfirmasi Lunas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($spp)>0)
                        @foreach($spp as $spps)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
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
        <h2>Daftar Tagihan <span class="blue_light">Spp<span></h2>
    </div>
    <div class="form-step">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="text_align_center">
                        <h2>Tidak Ada Daftar Tagihan</h2>
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
                            <h3>Choose.</h3>
                            <ul class="commodo">
                                <li>Commodo</li>
                                <li>consequat. Duis a</li>
                                <li>ute irure dolor</li>
                                <li>in reprehenderit </li>
                                <li>in voluptate </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="infoma">
                            <h3>Get Support.</h3>
                            <ul class="conta">
                                <li><i class="fa fa-map-marker" aria-hidden="true"></i>Address : Loram Ipusm
                                </li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i>Call : +01 1234567890</li>
                                <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="Javascript:void(0)"> Email : demo@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="infoma">
                            <h3>Company.</h3>
                            <ul class="menu_footer">
                                <li><a href="index.html">Beranda</a></li>
                                <li><a href="about.html">Tentang </a></li>
                                <li><a href="domain.html">Domain</a></li>
                                <li><a href="hosting.html">Hosting</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="infoma text_align_left">
                            <h3>Services.</h3>
                            <ul class="commodo">
                                <li>Commodo</li>
                                <li>consequat. Duis a</li>
                                <li>ute irure dolor</li>
                                <li>in reprehenderit </li>
                                <li>in voluptate </li>
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
</body>

</html>