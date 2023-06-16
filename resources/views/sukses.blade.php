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