<?php

namespace App\Http\Controllers\Admin;

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
        
        return view('admin.beranda.index', [
            'pengaduan' => $pengaduan,
        ]);
    }

    public function index_petugas()
    {
        $users = DB::table('role_user')
            ->join('users', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->select('users.*', 'roles.*', DB::raw('users.name AS nama_user'))
	        ->where('role_id', 2)
            ->get();

        return view('admin.beranda.datapetugas', ['users' => $users]);
    }

    public function index_masyarakat()
    {
        $users = DB::table('role_user')
            ->join('users', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->select('users.*', 'roles.*', DB::raw('users.name AS nama_user'))
	        ->where('role_id', 3)
            ->get();

        return view('admin.beranda.datamasyarakat', ['users' => $users]);
    }

    public function index_tentang()
    {
        return view('admin.beranda.tentang');
    }

    public function tambah_petugas()
    {
        return view('admin.admin_petugas.tambah');
    }

    public function RegisterPetugas(Request $request)
    {
        $request->validate([
            'nik' => 'required|min:5',
            'name' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'password' => bcrypt($request->password),
        ]);

        $role = Role::select('id')->where('name', 'petugas')->first();
        $user->roles()->attach($role);

        return redirect()->route('admin.beranda.petugas');
    }

    public function delete_petugas($id)
    {
        if(Auth::user()->id == $id) {
            return redirect()->route('admin.beranda.petugas');
        }

        $user = User::find($id);

        if($user) {
            $user->roles()->detach();
            $user->delete();

            return redirect()->route('admin.beranda.petugas');
        }
        
        return redirect()->route('admin.beranda.petugas');
    }

    public function aduan_detail($id)
    {
        $pengaduan = Pengaduan::find($id);
        $tanggapan = DB::table('tanggapans')
            ->join('users', 'users.id', '=', 'tanggapans.user_id')
            ->join('pengaduans', 'pengaduans.id', '=', 'tanggapans.pengaduan_id')
            ->select('users.*', 'pengaduans.*', 'tanggapans.*', DB::raw('users.name AS nama_user'))
	        ->where('pengaduan_id', $id)
            ->get();

        return view('admin.beranda.detailaduan', [
            'pengaduan' => $pengaduan,
            'tanggapan' => $tanggapan,
        ]);
    }
}
