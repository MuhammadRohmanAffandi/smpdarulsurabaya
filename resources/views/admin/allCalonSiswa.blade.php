<!DOCTYPE html>
<html lang="en">

@include('layouts.admin.head')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<style>
    #myPanzoom {
        max-width: 600px;
        height: 400px;
        background: #eee;
    }
</style>

<body>
    @if(session()->has('message'))
    <div class="alert alert-danger">
        <b>Gagal Mengganti Status! </b>
        {{ session()->get('message') }}
    </div>
    @elseif(session()->has('berhasil_dirubah'))
    <div class="alert alert-success">
        {{ session()->get('berhasil_dirubah') }}
    </div>
    @endif
    @include('layouts.admin.navbar')
    <div class="subnavbar">
        <div class="subnavbar-inner">
            <div class="container">
                <ul class="mainnav">
                    <li><a href="dashboard"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                    <li class="active"><a href=""><i class="icon-list-alt"></i><span>Calon Siswa</span> </a> </li>
                    <li><a href="{{url('alluser')}}"><i class="icon-user"></i><span>Users</span> </a> </li>
                    <li><a href="{{url('allsiswa')}}"><i class="icon-user"></i><span>Siswa</span> </a></li>
                    <li><a href="{{url('konfirmasipembayaran')}}"><i class="icon-dollar"></i><span>Konfirmasi Pembayaran SPP</span> </a> </li>
                    <li><a href="{{url('spp')}}"><i class="icon-dollar"></i><span>Daftar SPP</span> </a> </li>
                </ul>
            </div>
            <!-- /container -->
        </div>
        <!-- /subnavbar-inner -->
    </div>

    <div class="container">
        <table class="table" id="myTable">
            <thead>
                <tr class="table-top">
                    <th scope="col">Nama</th>
                    <th scope="col">Status</th>
                    <th scope="col">Detail</th>
                    <th scope="col">Ubah Status</th>
                    <th scope="col">Bukti Pembayaran</th>
                    <th scope="col">Tanggal Upload</th>
                </tr>
            </thead>
            <tbody>
                @foreach($calonSiswa as $calonSiswas)
                <tr>
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
                                    <input type="submit" value="SUBMIT" class="btn btn-primary" />
                                </div>
                            </form>
                        </div>

                    </td>
                    @if($calonSiswas->bukti_pembayaran == NULL)
                    <td>Tidak Ada Bukti Pembayaran</td>
                    @else
                    <td> <a class="btn btn-primary" href="{{ route('showBuktiPembayaran', $calonSiswas->bukti_pembayaran)}}" target="_blank">Lihat File</a></td>
                    @endif
                    <td>{{$calonSiswas->created_at}}</td>
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
</body>

</html>