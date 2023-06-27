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
   <!-- contact -->
   <form id="userAccountSetupForm" name="userAccountSetupForm" enctype="multipart/form-data" method="POST" action="{{ route('calonSiswa.store') }}">
      <div class="form_pendaftaran">
         <div class="container">
            <div class="row ">
               <div class="col-md-12">
                  <div class="titlepage text_align_center">
                     <h2>Form <span class="blue_light">Pendaftaran</span></h2>
                  </div>
               </div>
               <div id="multi-step-form-container">
                  <!-- Form Steps / Progress Bar -->
                  <ul class="form-stepper form-stepper-horizontal text-center mx-auto pl-0">
                     <!-- Step 1 -->
                     <li class="form-stepper-active text-center form-stepper-list" step="1">
                        <a class="mx-2">
                           <span class="form-stepper-circle">
                              <span>1</span>
                           </span>
                           <div class="label">Identitas Pribadi</div>
                        </a>
                     </li>
                     <!-- Step 2 -->
                     <li class="form-stepper-unfinished text-center form-stepper-list" step="2">
                        <a class="mx-2">
                           <span class="form-stepper-circle text-muted">
                              <span>2</span>
                           </span>
                           <div class="label text-muted">Alamat & Kontak</div>
                        </a>
                     </li>
                     <!-- Step 3 -->
                     <li class="form-stepper-unfinished text-center form-stepper-list" step="3">
                        <a class="mx-2">
                           <span class="form-stepper-circle text-muted">
                              <span>3</span>
                           </span>
                           <div class="label text-muted">Asal Sekolah</div>
                        </a>
                     </li>
                  </ul>
                  <!-- Step Wise Form Content -->
                  <!-- Step 1 Content -->
                  <section id="step-1" class="form-step">
                     <h2 class="text_align_center title-step-form">Identitas Pribadi</h2>
                     <!-- Step 1 input fields -->
                     <div class="mt-3">
                        <div class="form-group">
                           @csrf
                           @if (count($errors) > 0)
                           <div class="alert alert-danger">
                              <ul>
                                 @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                                 @endforeach
                              </ul>
                           </div>
                           @endif
                           <label>Nama Lengkap</label>
                           <input type="text" class="form-control" id="namaLengkap" placeholder="Masukan Nama Lengkap" name="nama" value="{{ old('nama') }}">
                        </div>
                        <div class="form-group">
                           <label>NISN</label>
                           <input type="text" class="form-control" id="nisn" placeholder="Masukan NISN" name="nisn" value="{{ old('nisn') }}">
                        </div>
                        <div class="form-group">
                           <label>NIK</label>
                           <input type="text" class="form-control" id="nik" placeholder="Masukan NIK" name="nik" value="{{ old('nik') }}">
                        </div>
                        <div class="form-group">
                           <label>Tempat Lahir</label>
                           <input type="text" class="form-control" id="tempatLahir" placeholder="Masukan Tempat Lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                        </div>
                        <div class="form-group">
                           <label>Tanggal Lahir</label>
                           <input type="date" class="form-control" id="tanggalLahir" placeholder="mm/dd/yy" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                        </div>
                        <div class="form-group">
                           <label>Agama</label>
                           <input type="text" class="form-control" id="agama" placeholder="Masukan Agama" name="agama" value="{{ old('agama') }}">
                        </div>
                        <div class="form-group">
                           <label>Pas Foto</label>
                           <input type="file" class="form-control" id="pasFoto" name="file_path_pas_foto" value="{{ old('file_path_pas_foto') }}">
                        </div>
                        <div class="form-group">
                           <label>KK</label>
                           <input type="file" class="form-control" id="kk" name="file_path_kk" value="{{ old('file_path_kk') }}">
                        </div>
                     </div>
                     <div class="mt-3">
                        <button class="button btn-navigate-form-step" type="button" step_number="2">Next</button>
                     </div>
                  </section>
                  <!-- Step 2 Content, default hidden on page load. -->
                  <section id="step-2" class="form-step d-none">
                     <h2 class="text_align_center title-step-form">Alamat & Kontak</h2>
                     <!-- Step 2 input fields -->
                     <div class="mt-3">
                        <div class="form-group">
                           <label>RT</label>
                           <input type="text" class="form-control" id="rt" placeholder="Masukan RT" name="rt" value="{{ old('rt') }}">
                        </div>
                        <div class="form-group">
                           <label>RW</label>
                           <input type="text" class="form-control" id="rw" placeholder="Masukan RW" name="rw" value="{{ old('rw') }}">
                        </div>
                        <div class="form-group">
                           <label>Desa</label>
                           <input type="text" class="form-control" id="desa" placeholder="Masukan Desa" name="desa" value="{{ old('desa') }}">
                        </div>
                        <div class="form-group">
                           <label>Kecamatan</label>
                           <input type="text" class="form-control" id="kecamatan" placeholder="Masukan Kecamatan" name="kecamatan" value="{{ old('kecamatan') }}">
                        </div>
                        <div class="form-group">
                           <label>Kabupaten</label>
                           <input type="text" class="form-control" id="kabupaten" placeholder="Masukan Kabupaten" name="kabupaten" value="{{ old('kabupaten') }}">
                        </div>
                        <div class="form-group">
                           <label>No. Telp/HP</label>
                           <input type="text" class="form-control" id="noTelp" placeholder="Masukan No. Telp/HP" name="no_telp" value="{{ old('no_telp') }}">
                        </div>
                     </div>
                     <div class="mt-3">
                        <button class="button btn-navigate-form-step" type="button" step_number="1">Prev</button>
                        <button class="button btn-navigate-form-step" type="button" step_number="3">Next</button>
                     </div>
                  </section>
                  <!-- Step 3 Content, default hidden on page load. -->
                  <section id="step-3" class="form-step d-none">
                     <h2 class="text_align_center title-step-form">Asal Sekolah</h2>
                     <!-- Step 2 input fields -->
                     <div class="mt-3">
                        <div class="form-group">
                           <label>Nama Sekolah</label>
                           <input type="text" class="form-control" id="namaSekolah" placeholder="Masukan Nama Sekolah" name="nama_sekolah" value="{{ old('nama_sekolah') }}">
                        </div>
                        <div class="form-group">
                           <label>Ijasah</label>
                           <input type="file" class="form-control" id="ijasah" name="file_path_ijasah" value="{{ old('file_path_ijasah') }}">
                        </div>
                        <div class="form-group">
                           <label>Tahun Lulus</label>
                           <input type="text" class="form-control" id="tahunLulus" placeholder="Masukan Tahun Lulus" name="tahun_lulus" value="{{ old('tahun_lulus') }}">
                        </div>
                     </div>
                     <div class="mt-3">
                        <button class="button btn-navigate-form-step" type="button" step_number="2">Prev</button>
                     </div>
                     <br>
                     <button class="button submit-btn" type="submit">Upload</button>
                  </section>
                  <br>
               </div>
            </div>
         </div>
      </div>
   </form>
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