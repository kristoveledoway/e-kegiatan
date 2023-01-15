<?php

namespace App\Models;

use CodeIgniter\Model;

class M_master_pegawai extends Model 
{
    protected $table = 'master_pegawai';
    protected $primaryKey = 'id_master_pegawai';
    protected $allowedFields = ['id_pegawai','id_jabatan','id_sub_bagian'];

    function getAll() {
        $builder = $this->db->table('master_pegawai');
        $builder->join('pegawai', 'pegawai.id_pegawai = master_pegawai.id_pegawai');
        $builder->join('jabatan', 'jabatan.id_jabatan = master_pegawai.id_jabatan');
        $builder->join('sub_bagian', 'sub_bagian.id_sub_bagian = master_pegawai.id_sub_bagian');
        $query = $builder->get();
        return $query->getResult();
    }

    public function tambah($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function detail($id_master_pegawai)
    {
        $this->where(array('id_master_pegawai' => $id_master_pegawai));
        $query = $this->get();
        return $query->getRowArray();
    }

    public function edit($data)
    {
        $this->where('id_master_pegawai', $data['id_master_pegawai']);
        $this->replace($data);
    }

    public function hapus($id_master_pegawai)
    {
        $this->where('id_master_pegawai', $id_master_pegawai);
        $this->delete();
    }
}