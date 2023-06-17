<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMP Darul Ulum Surabaya</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
</head>

<body>

    @php
    $json = json_decode($calon);
    @endphp

    <body>
        <hr />

        <header style="text-align: center;">
            <img style="max-width: 272px" src="{{ asset('pas_foto/' . $json->file_path_pas_foto)}}" alt="Pas Foto">
            <h1>Nama Nama</h1>
            <p>ININIK</p>
        </header>

        <hr />

        <article class="content-status-pendaftaran" style="text-align: center;">
            <table class="table" style="text-align: left;">
                <tbody>
                    <tr>
                        <th scope="row">Nama</th>
                        <td>{{$json->nama}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Code Pendaftaran</th>
                        <td>{{$json->code_pendaftaran}}</td>
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
                        <th scope="row">Tahun Lulus</th>
                        <td>{{$json->tahun_lulus}}</td>
                    </tr>
                </tbody>
            </table>
        </article>

        <hr>
        <footer style="text-align: center;">
            <p>Copyright &copy; SMP Darul Ulum Surabaya.</p>
        </footer>
    </body>



    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>