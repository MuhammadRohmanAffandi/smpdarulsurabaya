<!DOCTYPE html>
<html lang="en">

@include('layouts.admin.head')

<body>
    @if(session()->has('message'))
    <div class="alert alert-danger">
        <b>Gagal Mengganti Status! </b>
        {{ session()->get('message') }}
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
                    <li><a href="{{url('konfirmasipembayaran')}}"><i class="icon-dollar"></i><span>Pembayaran SPPP</span> </a> </li>
                </ul>
            </div>
            <!-- /container -->
        </div>
        <!-- /subnavbar-inner -->
    </div>

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


    @include('layouts.admin.footer')
    <!-- Le javascript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    @include('layouts.admin.script')
</body>

</html>