<?php 

namespace App\Models;

use CodeIgniter\Model;

class Model_home extends Model
{
    public function tot_arsip()
    {
        return $this->db->table('tbl_arsip')->countAll();
    }

    public function tot_kategori()
    {
        return $this->db->table('tbl_kategori')->countAll();
    }

    public function tot_divisi()
    {
        return $this->db->table('tbl_divisi')->countAll();
    }
    public function tot_user()
    {
        return $this->db->table('tbl_user')->countAll();
    }
}