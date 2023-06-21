<?php

namespace App\Http\Controllers;

require "HomeController.php";

use App\Models\CalonSiswa;
use App\Models\DailyUserCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalonSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $calonSiswa = CalonSiswa::all();
        return view('admin', compact('calonSiswa'));
    }
    public function dashboard()
    {
        //
        $usersByMonth = DB::table('calon_siswas')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();

        // Menginisialisasi array bulan dengan jumlah pendaftar awal 0
        $monthlyData = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyData[$i] = 0;
        }

        // Memasukkan jumlah pendaftar ke dalam array bulan
        foreach ($usersByMonth as $user) {
            $month = $user->month;
            $totalUsers = $user->total;
            $monthlyData[$month] = $totalUsers;
        }

        // Menampilkan data bulan dengan jumlah pendaftar
        for ($i = 1; $i <= 12; $i++) {
            $month = date('F', mktime(0, 0, 0, $i, 1));
            $totalUsers = $monthlyData[$i];

            // echo "Bulan $month: $totalUsers user<br>";
        }
        // dd($monthlyData);
        // $dailyCount = DailyUserCount::select('count')->get();
        // $date = DailyUserCount::select('date')->get();
        return view('admin.dashboard', compact('monthlyData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('formPendaftaran');
    }

    private function createToken()
    {
        // echo "<script>console.log('CEK CEK CEK' );</script>";
        do {
            $rand = uniqid();
            $cek = CalonSiswa::where('code_pendaftaran', $rand);
            // echo "<script>console.log('rand: " . $rand . "' );</script>";
            // echo "<script>console.log('cek: " . $cek . "' );</script>";
            // echo "<script>console.log('Debug Objects: " . empty($cek) . "' );</script>";
            // sleep(3);
        } while (empty($cek));
        return $rand;
    }

    public function searchPendaftaran(Request $request)
    {
        $request->validate([
            'code' => 'required'
        ]);
        $calonSiswa = CalonSiswa::where('code_pendaftaran', $request->code)->get();
        if (count($calonSiswa) == 0) {
            return redirect()->back()->with('error', 'Data Tidak Ditemukan, pastikan kode pendaftaran anda benar, jika anda menghilangkan kode pendaftaran silahkan hubungi panitia untuk informasi lebih lanjut.');
        }

        return redirect('/statuspendaftaran')->with('calonSiswa', $calonSiswa);
    }

    public function buktiPendaftaran(string $id)
    {
        $calonSiswa = CalonSiswa::findOrFail($id);
        if ($calonSiswa->status != "Pendaftaran Selesai") {
            return redirect('/');
        } else {
            return view('buktiPendaftaran')->with('calon', $calonSiswa);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required|max:255',
            'nisn' => 'required|max:255',
            'nik' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required|max:255',
            'agama' => 'required|max:255',
            'file_path_pas_foto' => 'required',
            'file_path_pas_foto.*' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'file_path_kk' => 'required',
            'file_path_kk.*' => 'required|file|mimes:pdf|max:2048',
            'rt' => 'required|max:255',
            'rw' => 'required|max:255',
            'desa' => 'required|max:255',
            'kecamatan' => 'required|max:255',
            'kabupaten' => 'required|max:255',
            'no_telp' => 'required|max:255',
            'nama_sekolah' => 'required|max:255',
            'file_path_ijasah' => 'required',
            'file_path_kk.ijasah*' => 'required|file|mimes:pdf|max:2048',
            'tahun_lulus' => 'required|max:255',
        ]);
        // START PAS FOTO
        $path = $request->file('file_path_pas_foto');
        $nama_path_pas_foto = time() . rand(1, 99) . '.' . $path->extension();
        $tujuan_upload = 'pas_foto';
        $path->move($tujuan_upload, $nama_path_pas_foto);
        // END PAS FOTO

        // START KK
        $path = $request->file('file_path_kk');
        $nama_path_kk = time() . rand(1, 99) . '.' . $path->extension();
        $tujuan_upload = 'kk';
        $path->move($tujuan_upload, $nama_path_kk);
        // END KK
        // START IJASAH
        $path = $request->file('file_path_ijasah');
        $nama_path_ijasah = time() . rand(1, 99) . '.' . $path->extension();
        $tujuan_upload = 'ijasah';
        $path->move($tujuan_upload, $nama_path_ijasah);
        // END IJASAH

        //code pendaftaran
        $code = $this->createToken();

        CalonSiswa::create([
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'file_path_pas_foto' => $nama_path_pas_foto,
            'file_path_kk' => $nama_path_kk,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'no_telp' => $request->no_telp,
            'nama_sekolah' => $request->nama_sekolah,
            'file_path_ijasah' => $nama_path_ijasah,
            'tahun_lulus' => $request->tahun_lulus,
            'code_pendaftaran' => $code
        ]);

        return redirect('/sukses')->with('code', $code);
    }

    public function uploadBuktiPembayaran(Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'required'
        ]);
        $path = $request->file('bukti_pembayaran');
        $nama_path = time() . rand(1, 99) . '.' . $path->extension();
        $tujuan_upload = 'bukti_pembayaran';
        $path->move($tujuan_upload, $nama_path);
        $calonSiwa = CalonSiswa::find($request->bookId);
        $calonSiwa->bukti_pembayaran = $nama_path;
        $calonSiwa->status = "Pengecekan Bukti Pembayaran";
        $calonSiwa->update();
        return redirect('/cekstatuspendaftaran');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $calonSiswa = CalonSiswa::findOrFail($id);
        return view('edit', compact('calonSiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
