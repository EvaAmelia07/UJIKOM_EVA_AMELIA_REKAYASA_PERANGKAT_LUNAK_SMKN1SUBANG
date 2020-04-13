<?php

namespace App\Http\Controllers\Petugas;

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
        
        return view('petugas.beranda.index', [
            'pengaduan' => $pengaduan,
        ]);
    }

    public function data_petugas()
    {
        $users = Auth::user();

        return view('petugas.beranda.datapetugas', ['users' => $users]);
    }

    public function editPetugas($id)
    {
        $users = User::find($id);
        return view('petugas.beranda.edit', ['users' => $users]);
    }
    public function updatePetugas(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required',
            'name' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::where('id', $id)->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('petugas.beranda.petugas');
    }

    public function data_masyarakat()
    {
        $users = DB::table('role_user')
            ->join('users', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->select('users.*', 'roles.*', DB::raw('users.name AS nama_user'))
	        ->where('role_id', 3)
            ->get();

        return view('petugas.beranda.datamasyarakat', ['users' => $users]);
    }

    public function balasan_keluhan($id)
    {
        $pengaduan = Pengaduan::find($id);
        $tanggapan = DB::table('tanggapans')
            ->join('users', 'users.id', '=', 'tanggapans.user_id')
            ->join('pengaduans', 'pengaduans.id', '=', 'tanggapans.pengaduan_id')
            ->select('users.*', 'pengaduans.*', 'tanggapans.*', DB::raw('users.name AS nama_user'))
	        ->where('pengaduan_id', $id)
            ->get();

        return view('petugas.beranda.balasan', [
            'pengaduan' => $pengaduan,
            'tanggapan' => $tanggapan,
        ]);
    }

    public function tanggapan(Request $request)
    {
        $request->validate([
            'isi_tanggapan' => 'required',
            'pengaduan_id' => 'required',
        ]);
        
        // Simpan data
        Tanggapan::create([
            'user_id' => Auth::id(),
            'tanggal_tanggapan' => Carbon::now(),
            'isi_tanggapan' => $request->isi_tanggapan,
            'pengaduan_id' => $request->pengaduan_id,
        ]);

        return redirect()->route('petugas.beranda.index');
    }
}
