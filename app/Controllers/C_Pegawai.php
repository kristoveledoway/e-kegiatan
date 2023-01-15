<?php

namespace App\Controllers;

use App\Models\M_pegawai;

class C_Pegawai extends BaseController
{
    public function index()
    {
        $model = new M_pegawai();
        $data['pegawais'] = $model->findAll();
        return view('pegawai/v_pegawai', $data);
    }

    public function tambah_data()
    {
        $validate = $this->validate([
            'nama_pegawai' => 'required'
        ]);
        if ($validate) {
            $data = array(
                'id_pegawai' => $this->request->getVar('id_pegawai'),
                'nama_pegawai' => $this->request->getVar('nama_pegawai'),
            );
            $model = new M_pegawai();
            $model->tambah($data);
            return redirect()->to(base_url('pegawai'));
        }
        return view('pegawai/v_tambah_pegawai');
    }

    public function edit($id_pegawai)
    {
        $m_pegawai = new M_pegawai();
        $pegawai = $m_pegawai->detail($id_pegawai);

        $validate = $this->validate([
            'nama_pegawai' => 'required'
        ]);
        if ($validate) {
            $data = array(
                'id_pegawai' => $this->request->getVar('id_pegawai'),
                'nama_pegawai' => $this->request->getVar('nama_pegawai'),
            );
            $model = new M_pegawai();
            $model->edit($data);
            return redirect()->to(base_url('pegawai'));
        }
        $data = array(
            'pegawai' => $pegawai
        );
        return view('pegawai/v_edit_pegawai', $data);
    }

    public function hapus($id_pegawai)
    {
        $m_pegawai = new M_pegawai();
        $hapus_pegawai = $m_pegawai->hapus($id_pegawai);
        return redirect()->to(base_url('pegawai'));
    }
}
