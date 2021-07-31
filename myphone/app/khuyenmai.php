<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khuyenmai extends Model
{
    protected $table = "khuyenmai";
    protected $primaryKey  = 'MaKM';    
    public $timestamps = false;
}
