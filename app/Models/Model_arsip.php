<?php 

namespace App\Models;

use CodeIgniter\Model;

class Model_arsip extends Model
{
    public function all_data($filter)
    {
        $builder = $this->db->table('tbl_arsip') 
        ->join('tbl_divisi', 'tbl_divisi.id_divisi = tbl_arsip.id_divisi' , 'left')
        ->join('tbl_user', 'tbl_user.id_user = tbl_arsip.id_user' , 'left')
        ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_arsip.id_kategori' , 'left')
        ->orderBy('id_arsip', 'DESC');

        if (isset($filter['id_kategori'])) {
            $id_kategori = $filter['id_kategori'];
            $builder = $builder->where('tbl_arsip.id_kategori', $id_kategori);
        }

        return $builder->get()->getResultArray();
    }

    public function detail_data($id_arsip)
    {
        return $this->db->table('tbl_arsip') 
        ->join('tbl_divisi', 'tbl_divisi.id_divisi = tbl_arsip.id_divisi' , 'left')
        ->join('tbl_user', 'tbl_user.id_user = tbl_arsip.id_user' , 'left')
        ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_arsip.id_kategori' , 'left')
        ->where('id_arsip', $id_arsip)
        ->get()
        ->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_arsip')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_arsip')
        ->where('id_arsip',$data['id_arsip'])
        ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_arsip')
        ->where('id_arsip', $data['id_arsip'])
        ->delete($data);
    }
}