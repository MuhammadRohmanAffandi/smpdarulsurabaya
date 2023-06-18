<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    //
    public function tambahSiswa(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'nisn' => 'required|max:255',
            'tahun_masuk' => 'required|max:255'
        ]);

        Siswa::create([
            'nama' => $request->name,
            'nisn' => $request->nisn,
            'tahun_masuk' => $request->tahun_masuk
        ]);

        return redirect()->back()->with('message', 'Siswa Berhasil Ditambahkan!');
    }
    public function tambahEmailSiswa(Request $request)
    {

        $request->validate([
            'email' => 'required'
        ]);
        $iduser = DB::table('users')->where('email', $request->email)->get();
        $cek = DB::table('siswas')->where('id_user', $iduser[0]->id)->get();
        if (count($cek) > 0) {
            return redirect()->back()->with('error', 'Email Telah Digunakan!');
        }
        $calonSiswa = Siswa::find($request->bookId);
        $calonSiswa->id_user = $iduser[0]->id;
        $calonSiswa->update();
        return redirect()->back()->with('message', 'Email Berhasil Ditambahkan!');
    }

    public function index()
    {
        $siswa = Siswa::all();
        return view('allSiswa', compact('siswa'));
    }
}
