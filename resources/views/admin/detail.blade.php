<!DOCTYPE html>
<html lang="en">

@include('layouts.admin.head')

<body>
    @include('layouts.admin.navbar')
    <div class="subnavbar">
        <div class="subnavbar-inner">
            <div class="container">
                <ul class="mainnav">
                    <li><a href="{{url('dashboard')}}"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                    <li><a href="{{url('allcalonsiswa')}}"><i class="icon-list-alt"></i><span>Calon Siswa</span> </a> </li>
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
                                            <input type="submit" value="SUBMIT" class="btn btn-primary" />
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


    @include('layouts.admin.footer')
    <!-- Le javascript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    @include('layouts.admin.script')
</body>

</html>