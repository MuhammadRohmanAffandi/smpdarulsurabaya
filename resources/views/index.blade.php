<!DOCTYPE html>
<html lang="en">

<head>
   <link rel="icon" href="{{ asset('images/logo.ico') }}" type="image/x-icon">
   <!-- basic -->
   <meta charset="utf-8">
   <!-- site metas -->
   <title>SMP Darul Ulum Surabaya</title>
   <!-- bootstrap css -->
   <link rel="stylesheet" href="css/bootstrap.css">
   <!-- style css -->
   <link rel="stylesheet" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Tweaks for older IEs-->
</head>
<!-- body -->

<body class="main-layout">
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
                        <li class="nav-item active">
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
                        <li class="nav-item">
                           <a class="nav-link" style="    color: #fff;
    background-color: #2e428b;
    border-color: #2e428b;
    padding: 0.375rem 0.75rem;
    border-radius: 0.25rem;" href="{{url('login')}}">Login</a>
                        </li>
                     </ul>
                  </div>
               </nav>
            </div>
         </div>
      </div>
   </div>
   <!-- end header inner -->
   <!-- top -->
   <div class="full_bg">
      <div class="slider_main">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <!-- carousel code -->
                  <div id="banner1" class="carousel slide">
                     <ol class="carousel-indicators">
                        <li data-target="#banner1" data-slide-to="0" class="active"></li>
                        <li data-target="#banner1" data-slide-to="1"></li>
                        <li data-target="#banner1" data-slide-to="2"></li>
                     </ol>
                     <div class="carousel-inner">
                        <!-- first slide -->
                        <div class="carousel-item active">
                           <div class="carousel-caption relative">
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="dream">
                                       <h2>PENERIMAAN PESERTA DIDIK BARU</h2>
                                       <h1>SMP DARUL ULUM SURABAYA</h1>
                                       <a class="read_more" href="formpendaftaran">Daftar Sekarang</a>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="dream_img">
                                       <figure><img src="images/dream_img.png" alt="#" /></figure>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- second slide-->
                        <div class="carousel-item">
                           <div class="carousel-caption relative">
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="dream">
                                       <h2>SISTEM PEMBAYARAN SPP</h2>
                                       <h1>SMP DARUL ULUM SURABAYA</h1>
                                       <a class="read_more" href="{{url('pembayaranspp')}}">Akses Sistem</a>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="dream_img">
                                       <figure><img src="images/dream_img_spp.png" alt="#" /></figure>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- third slide-->
                        <div class="carousel-item">
                           <div class="carousel-caption relative">
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="dream">
                                       <h2>Kenapa Harus</h2>
                                       <h1>SMP DARUL ULUM SURABAYA?</h1>
                                       <a class="read_more" href="Javascript:void(0)">Selengkapnya</a>
                                       <a class="read_more" href="Javascript:void(0)">Hubungi Kami</a>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="dream_img">
                                       <figure><img src="images/banner3.png" alt="#" /></figure>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- controls -->
                     <a class="carousel-control-prev" href="#banner1" role="button" data-slide="prev">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#banner1" role="button" data-slide="next">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- end banner -->

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
   </div>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/custom.js"></script>
   <!-- sidebar -->
</body>

</html>