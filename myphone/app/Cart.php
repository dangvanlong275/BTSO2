<?php

namespace App;

use Illuminate\Support\Facades\Session;

class Cart 
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($sanpham, $masp){
        $storedItem = ['tongsl' => 0,'tongtien'=> $sanpham->DonGia, 'sanpham'=>$sanpham];
        if($this->items){
            if(array_key_exists($masp, $this->items)){
                $storedItem = $this->items[$masp];
            }
        }
        $storedItem['tongsl']++;
        $storedItem['tongtien']  = $sanpham->DonGia * $storedItem['tongsl'];
        $this->items[$masp] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $sanpham->DonGia;
       // return session()->all();
    }
}
