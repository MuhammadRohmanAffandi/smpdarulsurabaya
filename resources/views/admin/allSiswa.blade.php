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
    <div class="alert alert-success alert-float">
        {{ session()->get('message') }}
    </div>
    @elseif(session()->has('error'))
    <div class="alert alert-danger alert-float">
        {{ session()->get('error') }}
    </div>
    @endif
    @include('layouts.admin.navbar')
    <div class="subnavbar">
        <div class="subnavbar-inner">
            <div class="container">
                <ul class="mainnav">
                    <li><a href="dashboard"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                    <li><a href="{{url('allcalonsiswa')}}"><i class="icon-list-alt"></i><span>Calon Siswa</span> </a> </li>
                    <li><a href="{{url('alluser')}}"><i class="icon-user"></i><span>Users</span> </a> </li>
                    <li class="active"><a href="{{url('allsiswa')}}"><i class="icon-user"></i><span>Siswa</span> </a></li>
                    <li><a href="{{url('konfirmasipembayaran')}}"><i class="icon-dollar"></i><span>Pembayaran spp</span> </a> </li>
                    <li><a href="{{url('spp')}}"><i class="icon-dollar"></i><span>daftar spp</span> </a> </li>
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
                    <th scope="col">NISN</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tahun Masuk</th>
                    <th scope="col">Edit Siswa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siswa as $siswas)
                <tr>
                    <td>{{$siswas->nama}}</td>
                    <td>{{$siswas->nisn}}</td>
                    @if($siswas->id_user == NULL)
                    <td>
                        <a data-toggle="modal" data-id="{{$siswas->id}}" title="Add this item" class="open-AddBookDialog btn btn-primary" href="#addBookDialog">Tambah Email</a>
                        <div class="modal hide" id="addBookDialog">
                            <div class="modal-header">
                                <h3 class="modal-title">Tambah Email</h3>
                                <button class="close" data-dismiss="modal">×</button>
                            </div>
                            <form id="subscribe-email-form" enctype="multipart/form-data" method="POST" action="{{ route('tambahEmailSiswa')}}">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" name="bookId" id="bookId" value="" />
                                    <input id="email" type="email" class="form-control" name="email" />
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" value="SUBMIT" class="btn btn-primary" />
                                </div>
                            </form>
                        </div>
                    </td>
                    @else
                    @php
                    $user = DB::table('users')->where('id', $siswas->id_user)->get();
                    @endphp
                    <td>{{$user[0]->email}}</td>
                    @endif
                    <td>{{$siswas->tahun_masuk}}</td>
                    <td>
                        <a href="{{route('editSiswa', $siswas->id)}}" class="btn btn-primary">Edit</a>
                        <a data-toggle="modal" data-id="{{$siswas->id}}" title="Add this item" class="open-AddBookDialog btn btn-danger" href="#hapus">Hapus</a>
                        <div class="modal hide" id="hapus">
                            <div class="modal-header">
                                <h3 class="modal-title">Yakin Ingin Menghapus Sisaw?</h3>
                                <button class="close" data-dismiss="modal">×</button>
                            </div>
                            <form id="subscribe-email-form" enctype="multipart/form-data" method="POST" action="{{route('hapusSiswa')}}">
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
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href=" {{url('tambahsiswa')}}">
            <div style="
        width: 70px;
        height: 70px;
        background-color: red;
        border-radius: 50%;
        box-shadow: 0 6px 10px 0 #666;
        transition: all 0.1s ease-in-out;

        font-size: 50px;
        color: white;
        text-align: center;
        line-height: 70px;

        position: fixed;
        right: 50px;
        bottom: 50px;"> + </div>
        </a>
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