<?php

namespace App\Http\Controllers;

use App\Models\BuktiPembayaran;
use App\Models\Siswa;
use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PembayaranSppController extends Controller
{
    //
    public function index()
    {
        if (Auth::user()->role != "siswa") {
            return redirect('dashboard')->with('error', "Anda Bukan Siswa!");
        }
        $idUser = Auth::id();
        $idSiswa = Siswa::where('id_user', $idUser)->get();
        if (!count($idSiswa) > 0) {
            return view('emailTidakTertaut');
        }
        $spp = Spp::where('id_siswa', $idSiswa[0]->id)->where('lunas', 0)->get();
        return view('pembayaranSpp', compact('spp'));
    }

    public function uploadBuktiPembayaranSpp(Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);
        $path = $request->file('bukti_pembayaran');
        $nama_path_bukti_pembayaran = time() . rand(1, 99) . '.' . $path->extension();
        $tujuan_upload = 'bukti_pembayaran_spp';
        $path->move($tujuan_upload, $nama_path_bukti_pembayaran);
        BuktiPembayaran::create([
            'id_siswa' => $request->bookId,
            'bukti_pembayaran' => $nama_path_bukti_pembayaran
        ]);
        return redirect('pembayaranspp')->with('message', 'Bukti pembayaran berhasil diunggah');
    }

    public function sppLunas()
    {
        if (Auth::user()->role != "siswa") {
            return redirect('dashboard')->with('error', "Anda Bukan Siswa!");
        }
        $idUser = Auth::id();
        $idSiswa = Siswa::where('id_user', $idUser)->get();
        $spp = Spp::where('id_siswa', $idSiswa[0]->id)->get();
        // echo $spp;
        return view('sppLunas', compact('spp'));
    }

    public function konfirmasiPembayaran()
    {
        $bukti_pembayaran = DB::table('bukti_pembayarans')
            ->join('siswas', 'bukti_pembayarans.id_siswa', '=', 'siswas.id')
            ->select('bukti_pembayarans.id', 'bukti_pembayarans.bukti_pembayaran', 'bukti_pembayarans.id_siswa', 'bukti_pembayarans.telah_dikonfirmasi', 'siswas.nama', 'siswas.nisn')->get();
        return view('admin.konfirmasiPembayaran', compact('bukti_pembayaran'));
    }

    public function showBuktiPembayaran(string $path)
    {
        return response()->file('bukti_pembayaran_spp/' . $path);
    }

    public function konfirmasi(string $id)
    {
        $spp = Spp::where('id_siswa', $id)->where('lunas', 0)->get();
        return view('admin.konfirmasi')->with('spp', $spp);
    }

    public function konfirmasiPost(Request $request)
    {

        $formData = $request->all();
        $i = 0;
        foreach ($formData as $key => $value) {
            if ($i == 0) {
                $i++;
                continue;
            }
            $data = Spp::find($value);
            $data->lunas = 1;
            $data->save();
            $i++;
        }
        // echo "hallo";

        return redirect('konfirmasipembayaran')->with('message', 'Pembayaran Dikonfirmasi');
    }

    public function ubahStatus(Request $request)
    {
        $request->validate([
            'status' => 'required'
        ]);
        $bukti_pembayaran = BuktiPembayaran::find($request->bookId);
        $bukti_pembayaran->telah_dikonfirmasi = $request->status;
        $bukti_pembayaran->save();
        return redirect('konfirmasipembayaran');
    }

    public function hapus(Request $request)
    {
        $bukti_pembayaran = BuktiPembayaran::find($request->bookId);
        $bukti_pembayaran->delete();
        return redirect('konfirmasipembayaran')->with('message', 'Bukti Pembayaran Berhasil Dihapus');
    }
}
