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
   <div class="header_form">
      <div class="container">
         <div class="row d_flex">

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
                           <input type="text" class="form-control" id="namaLengkap" placeholder="Masukan Nama Lengkap" name="nama">
                        </div>
                        <div class="form-group">
                           <label>NISN</label>
                           <input type="text" class="form-control" id="nisn" placeholder="Masukan NISN" name="nisn">
                        </div>
                        <div class="form-group">
                           <label>NIK</label>
                           <input type="text" class="form-control" id="nik" placeholder="Masukan NIK" name="nik">
                        </div>
                        <div class="form-group">
                           <label>Tempat Lahir</label>
                           <input type="text" class="form-control" id="tempatLahir" placeholder="Masukan Tempat Lahir" name="tempat_lahir">
                        </div>
                        <div class="form-group">
                           <label>Tanggal Lahir</label>
                           <input type="date" class="form-control" id="tanggalLahir" placeholder="mm/dd/yy" name="tanggal_lahir">
                        </div>
                        <div class="form-group">
                           <label>Agama</label>
                           <input type="text" class="form-control" id="agama" placeholder="Masukan Agama" name="agama">
                        </div>
                        <div class="form-group">
                           <label>Pas Foto</label>
                           <input type="file" class="form-control" id="pasFoto" name="file_path_pas_foto">
                        </div>
                        <div class="form-group">
                           <label>KK</label>
                           <input type="file" class="form-control" id="kk" name="file_path_kk">
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
                           <input type="text" class="form-control" id="rt" placeholder="Masukan RT" name="rt">
                        </div>
                        <div class="form-group">
                           <label>RW</label>
                           <input type="text" class="form-control" id="rw" placeholder="Masukan RW" name="rw">
                        </div>
                        <div class="form-group">
                           <label>Desa</label>
                           <input type="text" class="form-control" id="desa" placeholder="Masukan Desa" name="desa">
                        </div>
                        <div class="form-group">
                           <label>Kecamatan</label>
                           <input type="text" class="form-control" id="kecamatan" placeholder="Masukan Kecamatan" name="kecamatan">
                        </div>
                        <div class="form-group">
                           <label>Kabupaten</label>
                           <input type="text" class="form-control" id="kabupaten" placeholder="Masukan Kabupaten" name="kabupaten">
                        </div>
                        <div class="form-group">
                           <label>No. Telp/HP</label>
                           <input type="text" class="form-control" id="noTelp" placeholder="Masukan No. Telp/HP" name="no_telp">
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
                           <input type="text" class="form-control" id="namaSekolah" placeholder="Masukan Nama Sekolah" name="nama_sekolah">
                        </div>
                        <div class="form-group">
                           <label>Ijasah</label>
                           <input type="file" class="form-control" id="ijasah" name="file_path_ijasah">
                        </div>
                        <div class="form-group">
                           <label>Tahun Lulus</label>
                           <input type="text" class="form-control" id="tahunLulus" placeholder="Masukan Tahun Lulus" name="tahun_lulus">
                        </div>
                     </div>
                     <div class="mt-3">
                        <button class="button btn-navigate-form-step" type="button" step_number="2">Prev</button>
                     </div>
                  </section>
                  <br>
                  <button class="button submit-btn" type="submit">Upload</button>
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
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <!-- sidebar -->
   <script src="js/custom.js"></script>
   <script src="js/form.js"></script>
</body>

</html>