<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $petugasRole = Role::where('name', 'petugas')->first();
        $masyarakatRole = Role::where('name', 'masyarakat')->first();

        $admin = User::create([
            'nik' => '3123',
            'name' => 'Admin',
            'tanggal_lahir' => '2020-04-07',
            'alamat' => 'subang',
            'password' => bcrypt('admin')
        ]);
        
        $petugas = User::create([
            'nik' => '13123',
            'name' => 'Petugas',
            'tanggal_lahir' => '2010-07-01',
            'alamat' => 'bandung',
            'password' => bcrypt('petugas')
        ]);
        $masyarakat = User::create([
            'nik' => '123312',
            'name' => 'masyarakat',
            'tanggal_lahir' => '2020-01-13',
            'alamat' => 'bandung',
            'password' => bcrypt('masyarakat')
        ]);

        $admin->roles()->attach($adminRole);
        $petugas->roles()->attach($petugasRole);
        $masyarakat->roles()->attach($masyarakatRole);
    }
}
