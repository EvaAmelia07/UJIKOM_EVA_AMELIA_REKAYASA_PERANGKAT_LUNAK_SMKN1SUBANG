<?php

namespace App\Http\Controllers\Masyarakat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pengaduan;
use App\Tanggapan;
use App\Role;
use App\User;
use Auth;
use Carbon\Carbon;
use DB;

class BerandaController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::all();
        
        return view('masyarakat.beranda.index', [
            'pengaduan' => $pengaduan,
        ]);
    }

    public function tulis_aduan()
    {
        return view('masyarakat.beranda.aduan');
    }

    public function aduan_saya()
    {
        $u_pengaduan = Pengaduan::where('user_id', Auth::id())->get();

        return view('masyarakat.beranda.aduansaya', [
            'u_pengaduan' => $u_pengaduan,
        ]);
    }

    public function detail_aduan($id)
    {
        $pengaduan = Pengaduan::find($id);
        $tanggapan = DB::table('tanggapans')
            ->join('users', 'users.id', '=', 'tanggapans.user_id')
            ->join('pengaduans', 'pengaduans.id', '=', 'tanggapans.pengaduan_id')
            ->select('users.*', 'pengaduans.*', 'tanggapans.*', DB::raw('users.name AS nama_user'))
	        ->where('pengaduan_id', $id)
            ->get();

        return view('masyarakat.beranda.detailaduan', [
            'pengaduan' => $pengaduan,
            'tanggapan' => $tanggapan,
        ]);
    }

    public function edit_aduan($id)
    {
        $pengaduan = Pengaduan::find($id);
        return view('masyarakat.beranda.editaduan', ['pengaduan' => $pengaduan]);
    }

    public function update_aduan(Request $request, $id)
    {
        $request->validate([
            'judul_aduan' => 'required',
            'isi_aduan' => 'required',
        ]);

        Pengaduan::where('id', $id)->update([
            'user_id' => Auth::id(),
            'tanggal_aduan' => Carbon::now(),
            'judul_aduan' => $request->judul_aduan,
            'isi_aduan' => $request->isi_aduan,
        ]);

        return redirect()->route('masyarakat.beranda.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_aduan' => 'required',
            'isi_aduan' => 'required',
        ]);
        
        // Simpan data
        Pengaduan::create([
            'user_id' => Auth::id(),
            'tanggal_aduan' => Carbon::now(),
            'judul_aduan' => $request->judul_aduan,
            'isi_aduan' => $request->isi_aduan,
        ]);

        return redirect()->route('masyarakat.beranda.index');
    }

    public function delete_aduan($id)
    {
        $pengaduan = Pengaduan::find($id);

        if($pengaduan) {
            $pengaduan->tanggapan()->detach();
            $pengaduan->delete();

            return redirect()->route('masyarakat.beranda.index');
        }
        
        return redirect()->route('masyarakat.beranda.index');
    }
}
