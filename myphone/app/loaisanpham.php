<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsToMany;
class loaisanpham extends Model
{
    protected $table = "loaisanpham";
    protected $primaryKey  = 'MaLSP';
    public $timestamps = false;

    
    // public function thongke(): BelongsToMany
    // {
    //     return $this->belongsToMany(chitiethoadon::class, 'sanpham', 'MaLSP', 'MaSP');
    // }
}
