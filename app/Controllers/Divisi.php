<?php

namespace App\Controllers;

use App\Models\Model_divisi;

class Divisi extends BaseController
{
    public function __construct()
    {
        $this->Model_divisi = new Model_divisi();
        helper('form');
    }
    public function index()
    {
        $data = array(
            'title' => 'Divisi/instansi',
            'divisi'=>$this->Model_divisi-> all_data(),
            'isi'   => 'v_divisi'
    );
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = array('nama_divisi' => $this->request->getPost('nama_divisi'));
        $this->Model_divisi->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
        return redirect()->to(base_url('divisi'));
    }

    public function edit($id_divisi)
    {
        $data = array(
            'id_divisi' => $id_divisi,
            'nama_divisi' => $this->request->getPost('nama_divisi'),
        );
        $this->Model_divisi->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Perbaharui !!!');
        return redirect()->to(base_url('divisi'));
    }

    public function delete($id_divisi)
    {
        $data = array(
            'id_divisi' => $id_divisi,
        );
        $this->Model_divisi->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('divisi'));
    }
}
