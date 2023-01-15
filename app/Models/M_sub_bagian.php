<?php

namespace App\Models;

use CodeIgniter\Model;

class M_sub_bagian extends Model 
{
    protected $table = 'sub_bagian';
    protected $primaryKey = 'id_sub_bagian';
    protected $allowedFields = ['nama_sub_bagian'];

    public function tambah($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function detail($id_sub_bagian)
    {
        $this->where(array('id_sub_bagian' => $id_sub_bagian));
        $query = $this->get();
        return $query->getRowArray();
    }

    public function edit($data)
    {
        $this->where('id_sub_bagian', $data['id_sub_bagian']);
        $this->replace($data);
    }

    public function hapus($id_sub_bagian)
    {
        $this->where('id_sub_bagian', $id_sub_bagian);
        $this->delete();
    }
}