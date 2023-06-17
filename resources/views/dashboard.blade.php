<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMP Darul Ulum Surabaya</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <a class="sidebar-link" href="{{ url('/')}}" aria-expanded="false">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">Home</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('dashboard')}}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                                <i class="ti ti-bell-ringing"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="images/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                                </a>
                            </li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="">
                <table class="table">
                    <thead>
                        <tr class="table-top">
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Status</th>
                            <th scope="col">Detail</th>
                            <th scope="col">Ubah Status</th>
                            <th scope="col">Bukti Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($calonSiswa as $calonSiswas)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$calonSiswas->nama}}</td>
                            <td>{{$calonSiswas->status}}</td>
                            <td><a href="{{ route('detail', $calonSiswas->id)}}" class="btn btn-primary">Lihat</a></td>
                            <td>
                                <a data-toggle="modal" data-id="{{$calonSiswas->id}}" title="Add this item" class="open-AddBookDialog btn btn-primary" href="#addBookDialog">Ubah</a>
                                <div class="modal hide" id="addBookDialog">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Ubah Status</h3>
                                        <button class="close" data-dismiss="modal">×</button>
                                    </div>
                                    <form id="subscribe-email-form" enctype="multipart/form-data" method="POST" action="{{ route('updateStatus')}}">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" name="bookId" id="bookId" value="" />
                                            <select id="cars" name="status">
                                                <option value="none" selected disabled hidden>Pilih Satu</option>
                                                <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
                                                <option value="Pengecekan Bukti Pembayaran">Pengecekan Bukti Pembayaran</option>
                                                <option value="Bukti Pembayaran Gagal Diverifikasi">Bukti Pembayaran Gagal Diverifikasi</option>
                                                <option value="Pendaftaran Selesai">Pendaftaran Selesai</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" value="SUBMIT" class="btn-primary" />
                                        </div>
                                    </form>
                                </div>

                            </td>
                            @if($calonSiswas->bukti_pembayaran == NULL)
                            <td>Tidak Ada Bukti Pembayaran</td>
                            @else
                            <td> <a class="btn btn-primary" href="{{ route('showBuktiPembayaran', $calonSiswas->bukti_pembayaran)}}" target="_blank">Lihat File</a></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
        $(document).on("click", ".open-AddBookDialog", function() {
            var myBookId = $(this).data('id');
            $(".modal-body #bookId").val(myBookId);
            console.log(myBookId);
        });
    </script>
</body>

</html>