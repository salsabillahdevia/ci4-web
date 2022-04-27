<?php

namespace App\Controllers;

use App\Models\Orang_model;

class Orang extends BaseController
{
    protected $orang_model;
    public function __construct()
    {
        $this->orang_model = new Orang_model();
    }
    public function index()
    {
        // $orang = $this->orang_model->findAll();

        $curentPage = $this->request->getVar('page_orang') ? $this->request->getVar('page_orang') : 1;
        // d($this->request->getVar('keyword'));
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $orang = $this->orang_model->search($keyword);
        } else {
            $orang = $this->orang_model;
        }

        // di bagian paginate ada 2 param. pertama jumlah data per halaman, kedua nama tabel di db nya
        $data = [
            'title' => 'Data Orang | Akasuna CI4',
            'orang' => $orang->paginate(10, 'orang'),
            'pager' => $orang->pager,
            'curentPage' => $curentPage
        ];

        return view('orang/index', $data);
    }

    //--------------------------------------------------------------------

}
