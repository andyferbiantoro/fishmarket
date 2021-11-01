<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokisIkan extends Model
{
    protected $table = "stokis_ikan";
    protected $fillable = [
       'jenis_ikan','harga_jual'
    ];
}
