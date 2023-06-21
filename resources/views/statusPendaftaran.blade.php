<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>SMP Darul Ulum Surabaya</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
   <!-- style css -->
   <link rel="stylesheet" href="{{asset('css/style.css')}}">
   <!-- Responsive-->
   <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
   <!-- fevicon -->
   <link rel="icon" href="{{asset('images/fevicon.png')}}" type="image/gif" />
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

@php
$json_output = json_decode(Session::get('calonSiswa'));
@endphp
@if (!$json_output)
<script>
   window.location.replace('/cekstatuspendaftaran')
</script>";
@else

<body class="main-layout inner_page">
   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="images/loading.gif" alt="#" /></div>
   </div>
   <!-- end loader -->
   <!-- header -->
   <div class="header">
      <div class="container">
         <div class="row d_flex">
            <div class=" col-md-2 col-sm-3 col logo_section">
               <div class="full">
                  <div class="center-desk">
                     <div class="logo">
                        <a href="index.html"><img src="images/logo.png" alt="#" /></a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-8 col-sm-12">
               <nav class="navigation navbar navbar-expand-md navbar-dark ">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarsExample04">
                     <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                           <a class="nav-link" href="/">Beranda</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="about">Tentang</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="contact">Hubungi Kami</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="cekstatuspendaftaran">cek status</a>
                        </li>
                     </ul>
                  </div>
               </nav>
            </div>
         </div>
      </div>
   </div>
   <!-- end header inner -->
   @if($json_output[0]->status == "Menunggu Pembayaran")
   <!-- contact -->
   <div class="text_align_center margin-title-status">
      <h1>STATUS PENDAFTARAN:</h1>
   </div>
   <div class="form-step margin-core-status">
      <div class="container">
         <div class="row ">
            <div class="col-md-12">
               <div class="titlepage text_align_center">
                  <h2>Menunggu Pembayaran</h2>
               </div>
            </div>
         </div>
         <div class="content-status-pendaftaran">
            <p>Silahkan transfer ke nomor rekening berikut:</p>
            <br>
            <table class="table">
               <tbody>
                  <tr>
                     <td>Nama Bank</td>
                     <td class="bold">: Nama Bank</td>
                  </tr>
                  <tr>
                     <td>No Rekening</td>
                     <td class="bold">: 987192384179348</td>
                  </tr>
                  <tr>
                     <td>Nama Akun</td>
                     <td class="bold">: SMP Darul Ulum Surabaya</td>
                  </tr>
                  <tr>
                     <td>Nominal</td>
                     <td class="bold">: Rp. 2.100.000,00</td>
                  </tr>
               </tbody>
            </table>
            <p>Setelah melakukan pembayaran upload bukti pembayaran pada link berikut:</p>
            <br>
         </div>
         <div class="text_align_center">
            <a data-toggle="modal" data-id="{{$json_output[0]->id}}" title="Add this item" class="open-AddBookDialog button" href="#addBookDialog">Upload Bukti Pembayaran</a>
            <div class="modal hide" id="addBookDialog">
               <div class="modal-header">
                  <h3 class="modal-title">Upload Bukti Pembayaran</h3>
                  <button class="close" data-dismiss="modal">×</button>
               </div>
               <form id="subscribe-email-form" enctype="multipart/form-data" method="POST" action="{{ route('uploadBuktiPembayaran')}}">
                  @csrf
                  <div class="modal-body">
                     <input type="hidden" name="bookId" id="bookId" value="" />
                     <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran">
                  </div>
                  <div class="modal-footer">
                     <input type="submit" value="SUBMIT" class="btn btn-primary" />
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!-- contact -->
   @elseif($json_output[0]->status == "Pengecekan Bukti Pembayaran")
   <!-- contact -->
   <div class="text_align_center margin-title-status">
      <h1>STATUS PENDAFTARAN:</h1>
   </div>
   <div class="form-step margin-core-status">
      <div class="container">
         <div class="row ">
            <div class="col-md-12">
               <div class="titlepage text_align_center">
                  <h2>Pengecekan Bukti Pembayaran</h2>
               </div>
            </div>
         </div>
         <div class="content-status-pendaftaran text_align_center">
            <p>Pengecekan <strong>bukti pembayaran </strong>oleh <strong>panitia PPDB </strong>SMP Darul Ulum Surabaya.</p>
            <br>
            <a href="{{ url('/')}}" class="button">Kembali Keberanda</a>
            <br>
         </div>
      </div>
   </div>
   <!-- contact -->
   @elseif($json_output[0]->status == "Bukti Pembayaran Gagal Diverifikasi")
   <!-- contact -->
   <div class="text_align_center margin-title-status">
      <h1>STATUS PENDAFTARAN:</h1>
   </div>
   <div class="form-step margin-core-status">
      <div class="container">
         <div class="row ">
            <div class="col-md-12">
               <div class="titlepage text_align_center gagal">
                  <h2>Bukti pembayaran gagal diverifikasi</h2>
               </div>
            </div>
         </div>
         <div class="content-status-pendaftaran text_align_center">
            <p>Bukti pembayaran gagal diverifikasi, silahkan datang kesekolah untuk informasi lebih lanjut.</p>
            <br>
            <a href="{{ url('/')}}" class="button">Kembali Keberanda</a>
            <br>
         </div>
      </div>
   </div>
   <!-- contact -->
   @else
   <!-- contact -->
   <div class="text_align_center margin-title-status">
      <h1>STATUS PENDAFTARAN:</h1>
   </div>
   <div class="form-step margin-core-status">
      <div class="container">
         <div class="row ">
            <div class="col-md-12">
               <div class="titlepage text_align_center">
                  <h2>Pendaftaran Selesai</h2>
               </div>
            </div>
         </div>
         <div class="content-status-pendaftaran text_align_center">
            <p>Silahkan datang kesekolah untuk melakukan <strong>pendaftaran ulang </strong> dengan membawa<strong> fotokopi KK</strong> dan<strong> Bukti Pendaftaran.</strong></p>
            <br>
            <p>
               <strong> Bukti pendaftaran</strong> dapat<strong> didownload</strong> pada link dibawah ini:
            </p>
            <br>
            <td> <a class="button" href="{{ route('buktiPendaftaran', $json_output[0]->id)}}">Lihat Bukti Pendaftarn</a></td>
         </div>
      </div>
   </div>
   </div>
   <!-- contact -->
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
                        <a href="https://goo.gl/maps/55nnaBEA5ZUBnrHh8">
                           <div id="map" style="width: 200px; height: 200px;"><img src="images/map.png" alt="#" /></div>
                        </a>
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
   <script>
      $(document).on("click", ".open-AddBookDialog", function() {
         var myBookId = $(this).data('id');
         $(".modal-body #bookId").val(myBookId);
         console.log(myBookId);
      });
   </script>
</body>
@endif

</html>