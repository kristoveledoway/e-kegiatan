<?php

namespace App\Controllers;

use App\Models\M_jabatan;

class C_Jabatan extends BaseController
{
    public function index()
    {
        $model = new M_jabatan();
        $data['jabatans'] = $model->findAll();
        return view('jabatan/v_jabatan', $data);
    }

    public function tambah_data()
    {
        $validate = $this->validate([
            'nama_jabatan' => 'required'
        ]);
        if ($validate) {
            $data = array(
                'id_jabatan' => $this->request->getVar('id_jabatan'),
                'nama_jabatan' => $this->request->getVar('nama_jabatan'),
            );
            $model = new M_jabatan();
            $model->tambah($data);
            return redirect()->to(base_url('jabatan'));
        }
        return view('jabatan/v_tambah_jabatan');
    }

    public function edit($id_jabatan)
    {
        $m_jabatan = new M_jabatan();
        $jabatan = $m_jabatan->detail($id_jabatan);

        $validate = $this->validate([
            'nama_jabatan' => 'required'
        ]);
        if ($validate) {
            $data = array(
                'id_jabatan' => $this->request->getVar('id_jabatan'),
                'nama_jabatan' => $this->request->getVar('nama_jabatan'),
            );
            $model = new M_jabatan();
            $model->edit($data);
            return redirect()->to(base_url('jabatan'));
        }
        $data = array(
            'jabatan' => $jabatan
        );
        return view('jabatan/v_edit_jabatan', $data);
    }

    public function hapus($id_jabatan)
    {
        $m_jabatan = new M_jabatan();
        $hapus_jabatan = $m_jabatan->hapus($id_jabatan);
        return redirect()->to(base_url('jabatan'));
    }
}
