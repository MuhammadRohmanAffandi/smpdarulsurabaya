<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SMP Darul Ulum Surabaya Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="{{asset('admin/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/pages/dashboard.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/panzoom/panzoom.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <style>
        #myPanzoom {
            max-width: 600px;
            height: 400px;
            background: #eee;
        }
    </style>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
    @include('layouts.admin.navbar')
    <div class="subnavbar">
        <div class="subnavbar-inner">
            <div class="container">
                <ul class="mainnav">
                    <li><a href="dashboard"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                    <li><a href="{{url('allcalonsiswa')}}"><i class="icon-list-alt"></i><span>Calon Siswa</span> </a> </li>
                    <li><a href="{{url('alluser')}}"><i class="icon-user"></i><span>Users</span> </a> </li>
                    <li><a href="{{url('allsiswa')}}"><i class="icon-user"></i><span>Siswa</span> </a></li>
                    <li class="active"><a href="{{url('konfirmasipembayaran')}}"><i class="icon-dollar"></i><span>Pembayaran spp</span> </a> </li>
                    <li><a href="{{url('spp')}}"><i class="icon-dollar"></i><span>Daftar SPP</span> </a> </li>
                </ul>
            </div>
            <!-- /container -->
        </div>
        <!-- /subnavbar-inner -->
    </div>

    <div class="container">

        <h2 class="text-center">Konfirmasi Pembayaran SPP Siswa</h2>
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        <br>

        <table class="table" id="myTable">
            <thead>
                <tr class="table-top">
                    <th scope="col">Nama Siswa</th>
                    <th scope="col">NISN</th>
                    <th scope="col">Bukti Pembayaran</th>
                    <th scope="col">Status</th>
                    <th scope="col">Hapus</th>
                    <th scope="col">Waktu Diunggah</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bukti_pembayaran as $bukti_pembayarans)
                <tr>
                    <td>{{$bukti_pembayarans->nama}}</td>
                    <td>{{$bukti_pembayarans->nisn}}</td>
                    <td>
                        <div class="f-panzoom" id="myPanzoom">
                            <img class="f-panzoom__content" src="{{asset('bukti_pembayaran_spp/'. $bukti_pembayarans->bukti_pembayaran)}}" />
                        </div>
                    </td>
                    <td>
                        @if($bukti_pembayarans->telah_dikonfirmasi == 0)
                        <b>Bukti Pembayaran Belum Dikonfirmasi</b>
                        @else
                        <b>Bukti Pembayaran Telah Dikonfirmasi</b>
                        @endif
                        <br>
                        <a class="btn btn-warning" href="{{ route('konfirmasiGet', $bukti_pembayarans->id_siswa)}}">Konfirmasi Pembayaran</a>
                        <a data-toggle="modal" data-id="{{$bukti_pembayarans->id}}" title="Add this item" class="open-AddBookDialog btn btn-primary" href="#addBookDialog">Ubah Status</a>
                        <div class="modal hide" id="addBookDialog">
                            <div class="modal-header">
                                <h3 class="modal-title">Ubah Status</h3>
                                <button class="close" data-dismiss="modal">×</button>
                            </div>
                            <form id="subscribe-email-form" enctype="multipart/form-data" method="POST" action="{{route('ubasStatusPembayaranSpp')}}">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" name="bookId" id="bookId" value="" />
                                    <select id="cars" name="status">
                                        <option value="none" selected disabled hidden>Pilih Satu</option>
                                        <option value="0">Belum Dikonfirmasi</option>
                                        <option value="1">Telah Dikonfirmasi</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" value="SUBMIT" class="btn btn-primary" />
                                </div>
                            </form>
                        </div>

                    </td>
                    <td>
                        <a data-toggle="modal" data-id="{{$bukti_pembayarans->id}}" title="Add this item" class="open-AddBookDialog btn btn-danger" href="#hapus">Hapus</a>
                        <div class="modal hide" id="hapus">
                            <div class="modal-header">
                                <h3 class="modal-title">Yakin Ingin Menghapus Bukti Pembayaran?</h3>
                                <button class="close" data-dismiss="modal">×</button>
                            </div>
                            <form id="subscribe-email-form" enctype="multipart/form-data" method="POST" action="{{route('hapusBuktiPembayaran')}}">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" name="bookId" id="bookId" value="" />
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" value="HAPUS" class="btn-danger" />
                                </div>
                            </form>
                        </div>
                    </td>
                    <td>{{$bukti_pembayarans->created_at}}</td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>


    @include('layouts.admin.footer')
    <!-- Le javascript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    @include('layouts.admin.script')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/panzoom/panzoom.umd.js"></script>
    <script>
        const container = document.getElementById("myPanzoom");
        const options = {
            click: "toggleCover"
        };

        new Panzoom(container, options);
    </script>
</body>

</html>