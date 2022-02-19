<?php

namespace App\Controllers;

use CodeIgniter\HTTP\UserAgent;

use App\Models\Model_user;
use App\Models\Model_divisi;

class User extends BaseController
{
    public function __construct()
    {
        $this->Model_user = new Model_user();
        $this->Model_divisi = new Model_divisi();
        helper('form');
    }

    public function index()
    {
        $data = array(
            'title' => 'Pengguna',
            'user' => $this->Model_user-> all_data(),
            'isi'   => 'user/v_index'
    );
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = array(
            'title' => 'Add Pengguna',
            'divisi' => $this->Model_divisi-> all_data(),
            'isi'   => 'user/v_add'
    );
        return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        if ($this->validate([
            'nama_user' => [
                'label'  => 'Nama Pengguna',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
            ],

            'email' => [
                'label'  => 'E-mail',
                'rules'  => 'required|is_unique[tbl_user.email]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                    'is_unique' => '{field} Sudah Dipakai, input {field} Lain !!!',
                ]
            ],
        
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
            ],

            'level' => [
                'label'  => 'Level',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
            ],

            'id_divisi' => [
                'label'  => 'Divisi/Instansi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
            ],
            
            'foto' => [
                'label'  => 'Foto',
                'rules'  => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg,image/gif]',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                    'max_size' => 'Ukuran {field} Max 1024 KB !!!',
                    'mime_in' => 'Format {field} Wajib PNG,JGP,JPEG,GIF',
                ]
                ],
            ])) {
                //perintah untuk upload foto yang akan digunakan di form
                $foto = $this->request->getfile('foto');
                //mengacak nama foto yangakan di upload
                $nama_file = $foto->getRandomName();
                //jika valid
                $data = array(
                    'nama_user' => $this->request->getPost('nama_user'),
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                    'level' => $this->request->getPost('level'),
                    'id_divisi' => $this->request->getPost('id_divisi'),
                    'foto' => $nama_file,
                );
                $foto->move('foto', $nama_file); //directori foto upload
                $this->Model_user->add($data);
                session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
                return redirect()->to(base_url('user'));
            }else{
                //jika tidak valid
                session() -> setFlashdata('errors',\config\Services::validation()->getErrors());
                return redirect()->to(base_url('user/add'));
            }
    }

    public function edit($id_user)
    {
        $data = array(
            'title' => 'Edit Pengguna',
            'divisi' => $this->Model_divisi-> all_data(),
            'user' => $this->Model_user-> detail_data($id_user),
            'isi'   => 'user/v_edit'
    );
        return view('layout/v_wrapper', $data);
    }
    
    public function update($id_user)
    {
        if ($this->validate([
            'nama_user' => [
                'label'  => 'Nama Pengguna',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
            ],
        
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
            ],

            'level' => [
                'label'  => 'Level',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
            ],

            'id_divisi' => [
                'label'  => 'Divisi/Instansi',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!',
                ]
            ],

            'foto' => [
                'label'  => 'Foto',
                'rules'  => 'max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg,image/gif]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max 1024 KB !!!',
                    'mime_in' => 'Format {field} Wajib PNG,JGP,JPEG,GIF',
                ]
                ],

            ])) {
                $foto = $this->request->getfile('foto');
                if ($foto->getError() == 4 ) {
                    $data = array(
                        'id_user' => $id_user,
                        'nama_user' => $this->request->getPost('nama_user'),
                        'password' => $this->request->getPost('password'),
                        'level' => $this->request->getPost('level'),
                        'id_divisi' => $this->request->getPost('id_divisi'),
                    );
                    $this->Model_user->edit($data);
                }else {
                    //menghapus data foto yg lamo
                    $user = $this->Model_user-> detail_data($id_user);
                    if ($user['foto'] !="") {
                        unlink('foto/'. $user['foto']);
                    }
                    $nama_file = $foto->getRandomName();
                    $data = array(
                        'id_user' => $id_user,
                        'nama_user' => $this->request->getPost('nama_user'),
                        'password' => $this->request->getPost('password'),
                        'level' => $this->request->getPost('level'),
                        'id_divisi' => $this->request->getPost('id_divisi'),
                        'foto' => $nama_file,
                    );
                    $foto->move('foto', $nama_file); //directori foto upload
                    $this->Model_user->edit($data);
                } 
                session()->setFlashdata('pesan', 'Data Berhasil Di Perbaharui !!!');
                return redirect()->to(base_url('user'));
            }else{
                //jika tidak valid
                session() -> setFlashdata('errors',\config\Services::validation()->getErrors());
                return redirect()->to(base_url('user/edit/' . $id_user ));
            }
    }

    public function delete($id_user)
    {
        //menghapus data foto yg lamo
        $user = $this->Model_user-> detail_data($id_user);
        if ($user['foto'] !="") {
            unlink('foto/'. $user['foto']);
        }
        $data = array(
            'id_user' => $id_user,
        );
        $this->Model_user->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus !!!');
        return redirect()->to(base_url('user'));
    }
}
