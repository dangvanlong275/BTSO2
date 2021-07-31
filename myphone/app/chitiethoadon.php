<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class chitiethoadon extends Model
{
    protected $table = "chitiethoadon";
    protected $primaryKey = "MaHD";
    public $timestamps  = false;
   
}
