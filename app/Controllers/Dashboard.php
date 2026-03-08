<?php

namespace App\Controllers;

use App\Models\RecordModel;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $model = new RecordModel();

        $data['records'] = $model
            ->orderBy('id', 'DESC')
            ->findAll();

        return view('dashboard', $data);
    }
}