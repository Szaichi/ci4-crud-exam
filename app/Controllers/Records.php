<?php

namespace App\Controllers;

use App\Models\RecordModel;

class Records extends BaseController
{
    public function index()
    {
        $model = new RecordModel();
        $pager = \Config\Services::pager();

        $data['records'] = $model->paginate(10);
        $data['pager'] = $model->pager;

        return view('records/index', $data);
    }

    public function create()
    {
        return view('records/create');
    }

    public function store()
    {
        $rules = [
            'title' => 'required|min_length[3]',
            'description' => 'required|min_length[10]',
            'status' => 'required',
            'category' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new RecordModel();

        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'status' => $this->request->getPost('status'),
            'category' => $this->request->getPost('category'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $model->insert($data);

        return redirect()->to('/records')->with('success', 'Record created successfully');
    }

    public function show($id)
    {
        $model = new RecordModel();
        $data['record'] = $model->find($id);

        return view('records/show', $data);
    }

    public function edit($id)
    {
        $model = new RecordModel();
        $data['record'] = $model->find($id);

        return view('records/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'title' => 'required|min_length[3]',
            'description' => 'required|min_length[10]',
            'status' => 'required',
            'category' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new RecordModel();

        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'status' => $this->request->getPost('status'),
            'category' => $this->request->getPost('category'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $model->update($id, $data);

        return redirect()->to('/records')->with('success', 'Record updated successfully');
    }

    public function delete($id)
    {
        $model = new RecordModel();
        $model->delete($id);

        return redirect()->to('/records')->with('success', 'Record deleted successfully');
    }
}