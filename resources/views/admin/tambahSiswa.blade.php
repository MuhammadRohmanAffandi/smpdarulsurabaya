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

        <h2 class="text-center">Form Tambah Users</h2>
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        <br>

        <div class="tab-pane" id="formcontrols">
            <form method="POST" id="edit-profile" class="form-horizontal" action="{{ route('tambahSiswa') }}">
                @csrf

                <fieldset>


                    <div class="control-group">
                        <label for="name" class="control-label">{{ __('Name') }}</label>

                        <div class="controls">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div> <!-- /controls -->
                    </div> <!-- /control-group -->


                    <div class="control-group">
                        <label for="nisn" class="control-label">{{ __('NISN') }}</label>

                        <div class="controls">
                            <input id="nisn" type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="{{ old('nisn') }}" required autocomplete="nisn">

                            @error('nisn')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div> <!-- /controls -->
                    </div> <!-- /control-group -->


                    <div class="control-group">
                        <label for="tahun_masuk" class="control-label">{{ __('Tahun masuk') }}</label>

                        <div class="controls">
                            <input id="tahun_masuk" type="text" class="form-control @error('tahun_masuk') is-invalid @enderror" name="tahun_masuk" value="{{ old('tahun_masuk') }}" required autocomplete="tahun_masuk">

                            @error('tahun_masuk')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div> <!-- /controls -->
                    </div> <!-- /control-group -->


                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Tambah') }}
                        </button>
                        <button class="btn">Cancel</button>
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