<?php

Route::get('/', function () {
    return view('welcome');
});
Route::get('try','ctrlTry@input')->name('try');

// nama=nama lengkap
// alamat=alamat
// invoice date=invdate
// due date=invdue
// array
// produk=produk[]
// qty=qty[]
// price=price[]