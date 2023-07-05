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
                    <li><a href="{{url('allcalonspp')}}"><i class="icon-list-alt"></i><span>Calon spp</span> </a> </li>
                    <li><a href="{{url('alluser')}}"><i class="icon-user"></i><span>Users</span> </a> </li>
                    <li><a href="{{url('allsiswa')}}"><i class="icon-user"></i><span>Siswa</span> </a></li>
                    <li><a href="{{url('konfirmasipembayaran')}}"><i class="icon-dollar"></i><span>Konfirmasi Pembayaran SPP</span> </a> </li>
                    <li class="active"><a href="{{url('spp')}}"><i class="icon-dollar"></i><span>Daftar SPP</span> </a> </li>
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
                    <th scope="col">Bulan</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NISN</th>
                    <th scope="col">nominal</th>
                    <th scope="col">Status</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($spp as $spps)
                <tr>
                    <td>{{$spps->bulan}}</td>
                    <td>{{$spps->tahun}}</td>
                    <td>{{$spps->nama}}</td>
                    <td>{{$spps->nisn}}</td>
                    <td>{{$spps->nominal}}</td>
                    @if($spps->lunas == 0)
                    <td>Belum Lunas</td>
                    @else
                    <td>Lunas</td>
                    @endif
                    <td>
                        <a data-toggle="modal" data-id="{{$spps->id}}" title="Add this item" class="open-AddBookDialog btn btn-primary" href="#addBookDialog">Ubah Nominal</a>
                        <div class="modal hide" id="addBookDialog">
                            <div class="modal-header">
                                <h3 class="modal-title">Ubah Nominal</h3>
                                <button class="close" data-dismiss="modal">×</button>
                            </div>
                            <form id="subscribe-email-form" enctype="multipart/form-data" method="POST" action="{{ route('ubahNominal')}}">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" name="bookId" id="bookId" value="" />
                                    <input type="number" step="any" name="nominal">
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" value="SUBMIT" class="btn btn-primary" />
                                </div>
                            </form>
                        </div>
                    </td>
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