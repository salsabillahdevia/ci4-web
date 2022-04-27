<?php
// ini namespasenya harus diubah dulu
namespace App\Controllers\Admin;

// sama bikin script dibawah ini buat ambil basecontrollernya
use App\Controllers\BaseController;

class Users extends BaseController
{
    public function index()
    {
        echo 'ini controller Users yang bisa akses admin doang yang ada di dalam folder admin';
    }

    //--------------------------------------------------------------------

}
