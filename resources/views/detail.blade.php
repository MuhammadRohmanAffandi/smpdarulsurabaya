<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMP Darul Ulum Surabaya</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
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
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-admin"></i>
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
                                    <img src="{{asset('images/user-1.jpg')}}" alt="" width="35" height="35" class="rounded-circle">
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
                @php
                $json = json_decode($calon);
                @endphp
                <div class="margin-table-detail">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">Nama</th>
                                <td>{{$json->nama}}</td>
                            </tr>
                            <tr>
                                <th scope="row">NISN</th>
                                <td>{{$json->nisn}}</td>
                            </tr>
                            <tr>
                                <th scope="row">NIK</th>
                                <td>{{$json->nik}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tempat Lahir</th>
                                <td>{{$json->tempat_lahir}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tanggal Lahir</th>
                                <td>{{$json->tanggal_lahir}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Agama</th>
                                <td>{{$json->agama}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Pas Foto</th>
                                <td><img style="max-width: 272px" src="{{ asset('pas_foto/' . $json->file_path_pas_foto)}}" alt="Pas Foto"></td>
                            </tr>
                            <tr>
                                <th scope="row">KK</th>
                                <td> <a class="btn btn-primary" href="{{ route('showKk', $json->file_path_kk)}}" target="_blank">Lihat File</a></td>
                            </tr>
                            <tr>
                                <th scope="row">RT</th>
                                <td>{{$json->rt}}</td>
                            </tr>
                            <tr>
                                <th scope="row">RW</th>
                                <td>{{$json->rw}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Desa</th>
                                <td>{{$json->desa}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kecamatan</th>
                                <td>{{$json->kecamatan}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kabupaten</th>
                                <td>{{$json->kabupaten}}</td>
                            </tr>
                            <tr>
                                <th scope="row">No. Telp</th>
                                <td>{{$json->no_telp}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Asal Sekolah</th>
                                <td>{{$json->nama_sekolah}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Ijasah</th>
                                <td> <a class="btn btn-primary" href="{{ route('showIjasah', $json->file_path_ijasah)}}" target="_blank">Lihat File</a></td>
                            </tr>
                            <tr>
                                <th scope="row">Tahun Lulus</th>
                                <td>{{$json->tahun_lulus}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Code Pendaftaran</th>
                                <td>{{$json->code_pendaftaran}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Status</th>
                                <td>{{$json->status}}</td>
                                <td>
                                    <a data-toggle="modal" data-id="{{$json->id}}" title="Add this item" class="open-AddBookDialog btn btn-primary" href="#addBookDialog">Ubah</a>
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
                            </tr>
                            <tr>
                                <th scope="row">Bukti Pembayaran</th>
                                @if($json->bukti_pembayaran == NULL)
                                <td>Tidak Ada Bukti Pembayaran</td>
                                @else
                                <td> <a class="btn btn-primary" href="{{ route('showBuktiPembayaran', $json->bukti_pembayaran)}}" target="_blank">Lihat File</a></td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script>
        $(document).on("click", ".open-AddBookDialog", function() {
            var myBookId = $(this).data('id');
            $(".modal-body #bookId").val(myBookId);
            console.log(myBookId);
        });
    </script>
</body>

</html>