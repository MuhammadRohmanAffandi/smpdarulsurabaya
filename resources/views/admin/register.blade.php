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
                    <li><a href="{{url('konfirmasipembayaran')}}"><i class="icon-dollar"></i><span>Pembayaran SPPP</span> </a> </li>
                </ul>
            </div>
            <!-- /container -->
        </div>
        <!-- /subnavbar-inner -->
    </div>

    <div class="container">

        <h2 class="text-center">Form Tambah Siswa</h2>
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
                        <label for="email" class="control-label">{{ __('Email') }}</label>

                        <div class="controls">
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div> <!-- /controls -->
                    </div> <!-- /control-group -->


                    <div class="control-group">
                        <label for="password" class="control-label">{{ __('Password') }}</label>

                        <div class="controls">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div> <!-- /control-group -->

                    <div class="control-group">
                        <label for="password-confirm" class="control-label">{{ __('Confirm Password') }}</label>

                        <div class="controls">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>


                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Tambah') }}
                        </button>
                        <a class="btn" href="{{url('alluser')}}">Cancel</a>
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