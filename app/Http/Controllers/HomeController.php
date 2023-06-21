<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application admin.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $calonSiswa = CalonSiswa::all();
        return view('admin.allCalonSiswa', compact('calonSiswa'));
    }

    public function detail(string $id)
    {
        $calonSiswa = CalonSiswa::findOrFail($id);
        // echo "<script>console.log('Debug Objects: " . $calonSiswa . "' );</script>";
        return view('admin.detail')->with('calon', $calonSiswa);
    }
    public function editStatus(string $id)
    {
        $calonSiswa = CalonSiswa::findOrFail($id);
        // return view('editStatus')->with('calonSiswa', $calonSiswa);
        echo "<script>console.log('Debug Objects: " . $calonSiswa . "' );</script>";
    }

    public function showKk(string $path)
    {
        // echo "<script>console.log('Debug Objects: " . $path . "' );</script>";

        return response()->file('kk/' . $path);
    }
    public function showIjasah(string $path)
    {
        // echo "<script>console.log('Debug Objects: " . $path . "' );</script>";

        return response()->file('ijasah/' . $path);
    }
    public function showBuktiPembayaran(string $path)
    {
        // echo "<script>console.log('Debug Objects: " . $path . "' );</script>";

        return response()->file('bukti_pembayaran/' . $path);
    }
    public function updateStatus(Request $request)
    {
        $request->validate([
            'status' => 'required'
        ]);
        // echo "<script>console.log('Debug Objects: " . $request->bookId . $request->status . "' );</script>";
        $calonSiswa = CalonSiswa::find($request->bookId);
        if ($request->status == "Pendaftaran Selesai" && $calonSiswa->bukti_pembayaran == "") {
            return redirect()->back()->with('message', 'Calon Siswa Belum Mengunggah Bukti Pembayaran!');
        }
        $calonSiswa->status = $request->status;
        $calonSiswa->update();
        $calonSiswa = CalonSiswa::find($request->bookId);
        if ($request->status == "Pendaftaran Selesai") {
            $cek = DB::table('siswas')->where('id_pendaftaran', $calonSiswa->id)->get();
            if (!count($cek) > 0) {
                $year = Carbon::now()->format('Y');
                Siswa::create([
                    'nama' => $calonSiswa->nama,
                    'nisn' => $calonSiswa->nisn,
                    'id_pendaftaran' => $calonSiswa->id,
                    'tahun_masuk' => $year,
                    'lulus' => 0
                ]);
            }
        }
        return redirect('allcalonsiswa')->with('berhasil_dirubah', 'status berhasil dirubah');
    }
}
