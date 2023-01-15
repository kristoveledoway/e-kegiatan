<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('v_admin_dashboard');
    }
}
