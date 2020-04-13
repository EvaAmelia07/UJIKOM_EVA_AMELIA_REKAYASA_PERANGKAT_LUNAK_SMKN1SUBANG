<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $guarded = [];
    protected $table = 'pengaduans';

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function tanggapan()
    {
        return $this->belongsToMany('App\Tanggapan', 'tanggapans', 'pengaduan_id');
    }
}
