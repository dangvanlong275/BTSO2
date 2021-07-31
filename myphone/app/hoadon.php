<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsToMany;
class hoadon extends Model
{
    protected $table = "hoadon";
    protected $primaryKey  = 'MaHD';
    public $timestamps = false;
    
    /**
     * The roles that belong to the hoadon
     *
     
     */
    public function getDonHang(): BelongsToMany
    {
        return $this->belongsToMany(sanpham::class, 'chitiethoadon', 'MaHD', 'MaSP');
    }
}
