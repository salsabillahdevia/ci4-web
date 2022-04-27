<?php

namespace App\Controllers;

class Coba extends BaseController
{
    public function index()
    {
        echo 'ini controller coba -_-';
    }

    public function about($nama = 'Akasuna', $num = 0)
    {
        // yang $this ini di definisikan di basecontroller di baris bawah. jadi objek nama ini bisa di panggil di controller apapun
        // echo "konnichiwa $this->nama-san!";
        echo "konnichiwa $nama-san!, nomer = $num";
    }

    //--------------------------------------------------------------------

}
