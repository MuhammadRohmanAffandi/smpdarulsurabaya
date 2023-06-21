<!DOCTYPE html>
<html lang="en">

@include('layouts.admin.head')

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
                    <li><a href="{{url('konfirmasipembayaran')}}"><i class="icon-dollar"></i><span>Pembayaran spp</span> </a> </li>
                    <li><a href="{{url('spp')}}"><i class="icon-dollar"></i><span>daftar spp</span> </a> </li>
                </ul>
            </div>
            <!-- /container -->
        </div>
        <!-- /subnavbar-inner -->
    </div>

    <div class="container">
        <h2>Konfirmasi Pembayaran Dari <span style="color: cadetblue;">{{$spp[0]->nama}}</span></h2>
        <p>*centang pada bulan yang ingin ditandai telah lunas</p>
        <div class="tab-pane" id="formcontrols">
            <form method="POST" id="edit-profile" class="form-horizontal" action="{{route('konfirmasi')}}">
                @csrf
                @foreach ($spp as $spps)
                <input type="checkbox" id="vehicle1" name="id{{$loop->iteration}}" value="{{$spps->id}}">
                <label for="vehicle1">SPP bulan
                    @if($spps->bulan=="1")
                    januari
                    @elseif($spps->bulan=="2")
                    februari
                    @elseif($spps->bulan=="3")
                    maret
                    @elseif($spps->bulan=="4")
                    april
                    @elseif($spps->bulan=="5")
                    mei
                    @elseif($spps->bulan=="6")
                    juni
                    @elseif($spps->bulan=="7")
                    juli
                    @elseif($spps->bulan=="8")
                    agustus
                    @elseif($spps->bulan=="9")
                    september
                    @elseif($spps->bulan=="10")
                    oktober
                    @elseif($spps->bulan=="11")
                    november
                    @else
                    desember
                    @endif
                    {{$spps->tahun}}</label><br>
                @endforeach
                <fieldset>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Konfirmasi') }}
                        </button>
                        <a class="btn" href="{{route('konfirmasiPembayaranSpp')}}">Cancel</a>
                    </div> <!-- /form-actions -->
                </fieldset>
            </form>
        </div>
    </div>


    @include('layouts.admin.footer')
    <!-- Le javascript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    @include('layouts.admin.script')
</body>

</html>