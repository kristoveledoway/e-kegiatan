<?php

namespace App\Models;

use CodeIgniter\Model;

class M_kinerja_harian extends Model 
{
    protected $table = 'kinerja_harian';
    protected $primaryKey = 'id_kinerja_harian';
    protected $allowedFields = ['id_master_pegawai','tgl','posisi_pegawai','kegiatan','quantity','output_pekerjaan','keterangan'];

    function getAll() {
        $builder = $this->db->table('kinerja_harian');
        $builder->join('master_pegawai', 'kinerja_harian.id_master_pegawai = master_pegawai.id_master_pegawai');
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

    public function detail($id_kinerja_harian)
    {
        $builder = $this->db->table('kinerja_harian');
        $builder->join('master_pegawai', 'kinerja_harian.id_master_pegawai = master_pegawai.id_master_pegawai');
        $builder->join('pegawai', 'pegawai.id_pegawai = master_pegawai.id_pegawai');
        $builder->join('jabatan', 'jabatan.id_jabatan = master_pegawai.id_jabatan');
        $builder->join('sub_bagian', 'sub_bagian.id_sub_bagian = master_pegawai.id_sub_bagian');
        $builder->where(array('id_kinerja_harian' => $id_kinerja_harian));
        $query = $builder->get();
        // $query = $this->get();
        return $query->getRowArray();
    }

    public function edit($data)
    {
        $this->where('id_kinerja_harian', $data['id_kinerja_harian']);
        $this->replace($data);
    }

    public function hapus($id_kinerja_harian)
    {
        $this->where('id_kinerja_harian', $id_kinerja_harian);
        $this->delete();
    }
}