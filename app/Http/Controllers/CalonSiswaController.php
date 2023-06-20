<?php

namespace App\Http\Controllers;

require "HomeController.php";

use App\Models\CalonSiswa;
use Illuminate\Http\Request;

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
        $calonSiswa = CalonSiswa::where('code_pendaftaran', 'LIKE', "%{$request->code}%")->get();
        // echo "<script>console.log('Debug Objects: " . $calonSiswa . "' );</script>";

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
        // echo "<script>console.log('Debug Objects: " . $request->bookId . "' );</script>";
        $path = $request->file('bukti_pembayaran');
        $nama_path = time() . rand(1, 99) . '.' . $path->extension();
        $tujuan_upload = 'bukti_pembayaran';
        $path->move($tujuan_upload, $nama_path);
        $calonSiwa = CalonSiswa::find($request->bookId);
        $calonSiwa->bukti_pembayaran = $nama_path;
        $calonSiwa->status = "Pengecekan Bukti Pembayaran";
        $calonSiwa->update();
        $calonSiswa = CalonSiswa::where('code_pendaftaran', 'LIKE', "%{$calonSiwa->code}%")->get();
        // Alert::success('Success', 'Bukti Pembayaran Berhasil Diupload!');
        return redirect()->back()->with('calonSiswa', $calonSiswa);
        // $path = $request->file('bukti_pembayaran');
        // echo "<script>console.log('Debug Objects: " . $path . "' );</script>";
        // echo "<script>console.log('Debug Objects: " . $request->bukti_pembayaran . "' );</script>";
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
