<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $guarded = [];
    protected $table = 'tanggapans';

    public function pengaduan()
    {
        return $this->belongsTo('App\Pengaduan', 'pengaduan_id');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
