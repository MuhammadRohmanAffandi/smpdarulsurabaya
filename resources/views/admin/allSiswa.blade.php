<!DOCTYPE html>
<html lang="en">

@include('layouts.admin.head')

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
                    <th scope="col">NISN</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tahun Masuk</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siswa as $siswas)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
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
                                    <input type="submit" value="SUBMIT" class="btn-primary" />
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
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{url('tambahsiswa')}}">
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
</body>

</html>