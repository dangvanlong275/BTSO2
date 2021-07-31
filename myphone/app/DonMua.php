<?php

namespace App;

use Illuminate\Support\Facades\Session;

class DonMua 
{
    public $chitietdon ;
    public $hoadon;

    public function __construct($chitietdon,$hoadon)
    {
        $this->chitietdon = $chitietdon;
        $this->hoadon = $hoadon;
    }

}
