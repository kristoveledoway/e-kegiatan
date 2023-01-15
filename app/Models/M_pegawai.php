<?php

namespace App\Models;

use CodeIgniter\Model;

class M_pegawai extends Model 
{
    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';
    protected $allowedFields = ['nama_pegawai'];

    public function tambah($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function detail($id_pegawai)
    {
        $this->where(array('id_pegawai' => $id_pegawai));
        $query = $this->get();
        return $query->getRowArray();
    }

    public function edit($data)
    {
        $this->where('id_pegawai', $data['id_pegawai']);
        $this->replace($data);
    }

    public function hapus($id_pegawai)
    {
        $this->where('id_pegawai', $id_pegawai);
        $this->delete();
    }
}