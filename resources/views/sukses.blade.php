<!DOCTYPE html>
<html lang="en">

<head>
   <link rel="icon" href="{{ asset('images/logo.ico') }}" type="image/x-icon">
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
   <link rel="stylesheet" href="css/bootstrap.css">
   <!-- style css -->
   <link rel="stylesheet" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

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
   <div class="alert alert-warning">
      <b>HARAP DIPERHATIKAN</b>
      <p> Salin dan Simpan Code Penaftaran Untuk Melihat Status Pendaftaran Anda</p>
   </div>
   <!-- contact -->
   <div class="form-step margin-form-step">
      <div class="container">
         <div class="row ">
            <div class="col-md-12">
               <div class="titlepage text_align_center">
                  <h2>Pendaftaran Berhasil</h2>
               </div>
            </div>
            <div id="multi-step-form-cek">
               <h2 class="text_align_center title-step-form">Kode Pendaftaran:</h2>
               <div class="form-inline">
                  <input type=text value="{{Session::get('code')}}" class="form-control-status" id="code"></input>
                  <div class="text_align_center">
                     <button onclick="copyToClip()" class="button" style="background-color: #00A4A5;">Copy Kode</button>
                  </div>
               </div>
               <div class="text_align_center">
                  <button onclick="location.href='cekstatuspendaftaran'" type="button" class="btn btn-outline-custom">Cek Status Pendaftaran</button>
               </div>
            </div>
         </div>
      </div>
   </div>

   <script>
      function copyToClip() {
         // Get the text field
         var copyText = document.getElementById("code");

         // Select the text field
         copyText.select();
         copyText.setSelectionRange(0, 99999); // For mobile devices

         // Copy the text inside the text field
         navigator.clipboard.writeText(copyText.value);

         // Alert the copied text
         alert("Copied the text: " + copyText.value);
      }
   </script>
   <!-- contact -->
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
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <!-- sidebar -->
   <script src="js/custom.js"></script>
   <script src="js/form.js"></script>
</body>

</html>