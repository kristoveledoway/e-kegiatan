<?php

namespace App\Controllers;

use App\Models\M_master_pegawai;
use App\Models\M_pegawai;
use App\Models\M_jabatan;
use App\Models\M_sub_bagian;

class C_Master_pegawai extends BaseController
{
    public function index()
    {
        $model = new M_master_pegawai();
        $data['master_pegawais'] = $model->getAll();
        return view('master_pegawai/v_master_pegawai', $data);
    }

    public function tambah_data()
    {
        $validate = $this->validate([
            'id_pegawai' => 'required'
        ]);
        if ($validate) {
            $data = array(
                'id_master_pegawai' => $this->request->getVar('id_master_pegawai'),
                'id_pegawai' => $this->request->getVar('id_pegawai'),
                'id_jabatan' => $this->request->getVar('id_jabatan'),
                'id_sub_bagian' => $this->request->getVar('id_sub_bagian'),
            );
            $model = new M_master_pegawai();
            $model->tambah($data);
            return redirect()->to(base_url('master_pegawai'));
        }
        $pegawai = new M_pegawai();
        $jabatan = new M_jabatan();
        $sub_bagian = new M_sub_bagian();
        $data['pegawais'] = $pegawai->findAll();
        $data['jabatans'] = $jabatan->findAll();
        $data['sub_bagians'] = $sub_bagian->findAll();
        return view('master_pegawai/v_tambah_master_pegawai', $data);
    }

    public function edit($id_master_pegawai)
    {
        $m_master_pegawai = new M_master_pegawai();
        $master_pegawai = $m_master_pegawai->detail($id_master_pegawai);

        $validate = $this->validate([
            'id_pegawai' => 'required'
        ]);
        if ($validate) {
            $data = array(
                'id_master_pegawai' => $this->request->getVar('id_master_pegawai'),
                'id_pegawai' => $this->request->getVar('id_pegawai'),
                'id_jabatan' => $this->request->getVar('id_jabatan'),
                'id_sub_bagian' => $this->request->getVar('id_sub_bagian'),
            );
            $model = new M_master_pegawai();
            $model->edit($data);
            return redirect()->to(base_url('master_pegawai'));
        }
        $data = array(
            'master_pegawai' => $master_pegawai
        );
        $pegawai = new M_pegawai();
        $jabatan = new M_jabatan();
        $sub_bagian = new M_sub_bagian();
        $data['pegawais'] = $pegawai->findAll();
        $data['jabatans'] = $jabatan->findAll();
        $data['sub_bagians'] = $sub_bagian->findAll();
        return view('master_pegawai/v_edit_master_pegawai', $data);
    }

    public function hapus($id_master_pegawai)
    {
        $m_master_pegawai = new M_master_pegawai();
        $hapus_master_pegawai = $m_master_pegawai->hapus($id_master_pegawai);
        return redirect()->to(base_url('master_pegawai'));
    }
}
