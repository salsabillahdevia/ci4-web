<?php

namespace App\Controllers;

// bikin instansiasi modelnya (kayak construct). kalo ada model lain harus dipanggil juga
use App\Models\Comics_model;

class Comics extends BaseController
{
    protected $comics_model;
    public function __construct()
    {
        // ini modelnya berarti bisa dipake di controller ini aja. kalo ma bisa dipake di semua controller taronya di BaseController ketik $this->comics_model = new \App\Models\Comics_model();
        $this->comics_model = new Comics_model();
    }
    public function index()
    {
        $komik = $this->comics_model->getComics();

        $data = [
            'title' => 'Comic Data | Akasuna CI4',
            'komik' => $komik
        ];

        // cara konek ke db manual
        // $db = \Config\Database::connect();
        // $komik = $db->query('SELECT * FROM komik');
        // foreach ($komik->getResultArray() as $row) {
        //     d($row);
        // }

        // konek pake model sebelum pake construct.
        // $comicskModel = new Comics_model();
        // // findAll itu kayak select * from
        // $komik = $comicskModel->findAll();
        // d($komik);


        return view('comics/index', $data);
    }

    public function detail($slug)
    {
        $komik = $this->comics_model->getComics($slug);

        $data = [
            'title' => 'Detail Komik | Akasuna CI4',
            'komik' => $komik
        ];

        // jika komik tidak ada di tabel
        if (empty($komik)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Komik ' . $slug . ' tidak ditemukan!');
        }

        return view('comics/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Komik | Akasuna CI4',
            'validation' => \Config\Services::validation()
        ];


        return view('comics/create', $data);
    }

    public function save()
    {
        // validation
        if (!$this->validate([
            'judul' => 'required|is_unique[komik.judul]',
            'penulis' => 'required',
            'penerbit' => 'required',
            'sampul' =>
            [
                // uploaded itu kayak required, terus diisi param pake name di input nya
                'rules' => 'max_size[sampul,2000]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' =>
                [
                    'max_size' => 'Ukuran gambar maksimal 2MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            // ini buat nangkep pesan kesalahan dari form validation nya
            // $validation = \Config\Services::validation();
            // yang withInput() itu buat set_value. ini harus pake session
            // return redirect()->to('/comics/create')->withInput()->with('validation', $validation);
            return redirect()->to('/comics/create')->withInput();
        }
        $slug = url_title($this->request->getVar('judul'), '-', true);

        // ambil gambar
        $fileSampul = $this->request->getFile('sampul');
        // kalo ga ada gambar yang di upload
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.png';
        } else {
            // pindahkan file ke folder img
            $fileSampul->move('img');
            $namaSampul = $fileSampul->getName();
        }

        $this->comics_model->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');
        return redirect()->to('/comics');
    }

    public function delete($id_komik)
    {
        // cari gambar berdasarkan id
        $komik = $this->comics_model->find($id_komik);

        // cek kalo nama sampulnya default
        if ($komik['sampul'] != 'default.png') {
            // hapus gambar
            unlink('img/' . $komik['sampul']);
        }
        $this->comics_model->delete($id_komik);
        session()->setFlashdata('pesan', 'Data berhasil dihapus!');
        return redirect()->to('/comics');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Ubah Data Komik | Akasuna CI4',
            'validation' => \Config\Services::validation(),
            'komik' => $this->comics_model->getComics($slug)
        ];


        return view('comics/edit', $data);
    }

    public function update($id_komik)
    {
        // cek judul
        $komikLama = $this->comics_model->getComics($this->request->getVar('slug'));
        if ($komikLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[komik.judul]';
        }


        // validation
        if (!$this->validate([
            'judul' => $rule_judul,
            'penulis' => 'required',
            'penerbit' => 'required',
            'sampul' =>
            [
                // uploaded itu kayak required, terus diisi param pake name di input nya
                'rules' => 'max_size[sampul,2000]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' =>
                [
                    'max_size' => 'Ukuran gambar maksimal 2MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            // yang withInput() itu buat set_value. ini harus pake session
            return redirect()->to('/comics/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileSampul = $this->request->getFile('sampul');
        // cek gambar apakah gambar lama atau baru
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            // pindahin ke folder img
            $namaSampul = $fileSampul->getName();
            $fileSampul->move('img', $namaSampul);
            // hapus file lama
            unlink('img/' . $this->request->getVar('sampulLama'));
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->comics_model->save([
            'id_komik' => $id_komik,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah!');
        return redirect()->to('/comics');
    }


    //--------------------------------------------------------------------

}
