<?php 

namespace App\Models;

use CodeIgniter\Model;

class Model_divisi extends Model
{
    public function all_data()
    {
        return $this->db->table('tbl_divisi') 
        ->orderBy('id_divisi', 'DESC')
        ->get()
        ->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_divisi')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_divisi')
        ->where('id_divisi',$data['id_divisi'])
        ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_divisi')
        ->where('id_divisi', $data['id_divisi'])
        ->delete($data);
    }
}