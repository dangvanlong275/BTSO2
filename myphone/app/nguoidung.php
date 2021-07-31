<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nguoidung extends Model
{
    protected $table = "nguoidung";
    protected $primaryKey = 'MaND';
    public $timestamps = false;
    protected $fillable = [
        'TaiKhoan','MatKhau','MaQuyen','TrangThai'
    ];
}
