<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = "status";
    protected $primaryKey = "id_status";
    protected $guarded = ["id_status"];

    public function produk(){
        return $this->hasMany(Produk::class, 'id_produk');
    }
}
