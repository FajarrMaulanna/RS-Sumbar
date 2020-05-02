<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pasien_pdp extends Model
{
    protected $table='pasien_pdp';
    protected $fillable = 
    [
        'pasien_id','jumlah','tanggal','created_at','updated_at'
    ];

    public function pasien()
    {
        return $this->belongsTo(pasien::class);
    }
}
