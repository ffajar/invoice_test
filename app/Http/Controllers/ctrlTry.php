<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ctrlTry extends Controller
{
    public function input(Request $r){
    	for ($i = 0; $i < count($r->qty); $i++) {
    		@$total+=($r->qty[$i]*$r->price[$i]);
    	}
    	return view('welcome1',['data'=>$r,'total'=>'Rp'.number_format($total)]);
    }
}
