<?php

namespace App\Controllers;

use App\Models\M_kinerja_harian;
use App\Models\M_master_pegawai;

class C_Kinerja_harian extends BaseController
{
    public function index()
    {
        $model = new M_kinerja_harian();
        $data['kinerja_harians'] = $model->getAll();
        return view('kinerja_harian/v_kinerja_harian', $data);
    }

    public function tambah_data()
    {
        $validate = $this->validate([
            'id_master_pegawai' => 'required'
        ]);
        if ($validate) {
            $data = array(
                'id_kinerja_harian' => $this->request->getVar('id_kinerja_harian'),
                'id_master_pegawai' => $this->request->getVar('id_master_pegawai'),
                'tgl' => $this->request->getVar('tgl'),
                'posisi_pegawai' => $this->request->getVar('posisi'),
                'kegiatan' => $this->request->getVar('kegiatan'),
                'quantity' => $this->request->getVar('quantity'),
                'output_pekerjaan' => $this->request->getVar('output_pekerjaan'),
                'keterangan' => $this->request->getVar('keterangan'),
            );
            $model = new M_kinerja_harian();
            $model->tambah($data);
            return redirect()->to(base_url('kinerja_harian'));
        }
        // $this->kinerja_harian = new M_kinerja_harian();
        $master_pegawai = new M_master_pegawai();
        $data['master_pegawais'] = $master_pegawai->getAll();
        return view('kinerja_harian/v_tambah_kinerja_harian', $data);
    }

    public function edit($id_kinerja_harian)
    {
        $m_kinerja_harian = new M_kinerja_harian();
        $kh = $m_kinerja_harian->detail($id_kinerja_harian);

        $validate = $this->validate([
            'id_master_pegawai' => 'required'
        ]);
        if ($validate) {
            $data = array(
                'id_kinerja_harian' => $this->request->getVar('id_kinerja_harian'),
                'id_master_pegawai' => $this->request->getVar('id_master_pegawai'),
                'tgl' => $this->request->getVar('tgl'),
                'posisi_pegawai' => $this->request->getVar('posisi'),
                'kegiatan' => $this->request->getVar('kegiatan'),
                'quantity' => $this->request->getVar('quantity'),
                'output_pekerjaan' => $this->request->getVar('output_pekerjaan'),
                'keterangan' => $this->request->getVar('keterangan'),
            );
            $model = new M_kinerja_harian();
            $model->edit($data);
            return redirect()->to(base_url('kinerja_harian'));
        }
        $data = array(
            'kinerja_harians' => $kh
        );
        $master_pegawai = new M_master_pegawai();
        $data['master_pegawais'] = $master_pegawai->findAll();
        return view('kinerja_harian/v_edit_kinerja_harian', $data);
    }

    public function hapus($id_kinerja_harian)
    {
        $m_kinerja_harian = new M_kinerja_harian();
        $hapus_kinerja_harian = $m_kinerja_harian->hapus($id_kinerja_harian);
        return redirect()->to(base_url('kinerja_harian'));
    }
}
