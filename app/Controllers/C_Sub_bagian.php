<?php

namespace App\Controllers;

use App\Models\M_sub_bagian;

class C_Sub_bagian extends BaseController
{
    public function index()
    {
        $model = new M_sub_bagian();
        $data['sub_bagians'] = $model->findAll();
        return view('sub_bagian/v_sub_bagian', $data);
    }

    public function tambah_data()
    {
        $validate = $this->validate([
            'nama_sub_bagian' => 'required'
        ]);
        if ($validate) {
            $data = array(
                'id_sub_bagian' => $this->request->getVar('id_sub_bagian'),
                'nama_sub_bagian' => $this->request->getVar('nama_sub_bagian'),
            );
            $model = new M_sub_bagian();
            $model->tambah($data);
            return redirect()->to(base_url('sub_bagian'));
        }
        return view('sub_bagian/v_tambah_sub_bagian');
    }

    public function edit($id_sub_bagian)
    {
        $m_sub_bagian = new M_sub_bagian();
        $sub_bagian = $m_sub_bagian->detail($id_sub_bagian);

        $validate = $this->validate([
            'nama_sub_bagian' => 'required'
        ]);
        if ($validate) {
            $data = array(
                'id_sub_bagian' => $this->request->getVar('id_sub_bagian'),
                'nama_sub_bagian' => $this->request->getVar('nama_sub_bagian'),
            );
            $model = new M_sub_bagian();
            $model->edit($data);
            return redirect()->to(base_url('sub_bagian'));
        }
        $data = array(
            'sub_bagian' => $sub_bagian
        );
        return view('sub_bagian/v_edit_sub_bagian', $data);
    }

    public function hapus($id_sub_bagian)
    {
        $m_sub_bagian = new M_sub_bagian();
        $hapus_sub_bagian = $m_sub_bagian->hapus($id_sub_bagian);
        return redirect()->to(base_url('sub_bagian'));
    }
}
