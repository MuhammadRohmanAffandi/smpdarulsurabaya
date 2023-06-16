<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use Illuminate\Http\Request;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $calonSiswa = CalonSiswa::all();
        return view('dashboard', compact('calonSiswa'));
    }

    public function detail(string $id)
    {
        $calonSiswa = CalonSiswa::findOrFail($id);
        // echo "<script>console.log('Debug Objects: " . $calonSiswa . "' );</script>";
        return view('detail')->with('calon', $calonSiswa);
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
        $calonSiswa->status = $request->status;
        $calonSiswa->update();
        return redirect('dashboard');
    }
}
