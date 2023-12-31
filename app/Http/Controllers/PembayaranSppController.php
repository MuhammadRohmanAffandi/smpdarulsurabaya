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

    public function ubahNominal(Request $request)
    {
        $spp = Spp::findOrFail($request->bookId);
        $spp->nominal = $request->nominal;
        $spp->save();
        return redirect('spp')->with('message', 'nominal berhasil diganti');
    }

    public function showSpp()
    {
        $spp = DB::table('spps')->join('siswas', 'spps.id_siswa', '=', 'siswas.id')->select('spps.*', 'siswas.nama', 'siswas.nisn')->get();
        return view('admin.showSpp', compact('spp'));
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
        $spp = Spp::where('id_siswa', $idSiswa[0]->id)->where('lunas', 1)->get();
        // echo $spp;
        return view('sppLunas', compact('spp'));
    }

    public function konfirmasiPembayaran()
    {
        $bukti_pembayaran = DB::table('bukti_pembayarans')
            ->join('siswas', 'bukti_pembayarans.id_siswa', '=', 'siswas.id')
            ->select('bukti_pembayarans.id', 'bukti_pembayarans.bukti_pembayaran', 'bukti_pembayarans.id_siswa', 'bukti_pembayarans.telah_dikonfirmasi', 'bukti_pembayarans.created_at', 'siswas.nama', 'siswas.nisn')->get();
        return view('admin.konfirmasiPembayaran', compact('bukti_pembayaran'));
    }

    public function showBuktiPembayaran(string $path)
    {
        return response()->file('bukti_pembayaran_spp/' . $path);
    }

    public function konfirmasi(string $id_bukti_pembayaran)
    {
        $bukti_pembayaran = BuktiPembayaran::find($id_bukti_pembayaran);
        // echo $bukti_pembayaran;
        $spp = DB::table('spps')->join('siswas', 'spps.id_siswa', '=', 'siswas.id')->join('bukti_pembayarans', 'spps.id_siswa', '=', 'bukti_pembayarans.id_siswa')->select('spps.*', 'bukti_pembayarans.id as id_bukti', 'bukti_pembayarans.bukti_pembayaran', 'siswas.nama')->where('spps.id_siswa', $bukti_pembayaran->id_siswa)->where('lunas', 0)->where('telah_dikonfirmasi', 0)->get();
        // dd($spp);
        // echo ($spp[0]->nama);
        // echo $spp[0];
        // // $spp = Spp::where('id_siswa', $id)->where('lunas', 0)->get();
        return view('admin.konfirmasi')->with('spp', $spp);
    }

    public function konfirmasiPost(Request $request)
    {
        // dd($request->id_bukti);

        $formData = $request->all();
        $i = 0;
        foreach ($formData as $key => $value) {
            if ($i == 0 || $i == 1) {
                $i++;
                continue;
            }
            $data = Spp::find($value);
            $data->lunas = 1;
            $data->save();
            $i++;
        }
        $bukti = BuktiPembayaran::find($request->id_bukti);
        $bukti->telah_dikonfirmasi = 1;
        $bukti->save();
        // // echo "hallo";

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
