<?php

namespace App\Models;

use CodeIgniter\Model;

class M_jabatan extends Model 
{
    protected $table = 'jabatan';
    protected $primaryKey = 'id_jabatan';
    protected $allowedFields = ['nama_jabatan'];

    public function tambah($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function detail($id_jabatan)
    {
        $this->where(array('id_jabatan' => $id_jabatan));
        $query = $this->get();
        return $query->getRowArray();
    }

    public function edit($data)
    {
        $this->where('id_jabatan', $data['id_jabatan']);
        $this->replace($data);
    }

    public function hapus($id_jabatan)
    {
        $this->where('id_jabatan', $id_jabatan);
        $this->delete();
    }
}