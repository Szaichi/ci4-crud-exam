<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function register()
    {
        return view('auth/register');
    }

    public function store()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new UserModel();

        $email = $this->request->getPost('email');

        $existing = $model->where('email', $email)->first();

        if ($existing) {
            return redirect()->back()->withInput()->with('errors', ['email' => 'Email already exists']);
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $email,
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $model->insert($data);

        return redirect()->to('/login')->with('success', 'Account successfully created! Please login.');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function authenticate()
    {
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {

            session()->set([
                'id' => $user['id'],    
                'name' => $user['name'],  
                'logged_in' => true
            ]);

            return redirect()->to('/dashboard');
        }

        return redirect()->back()->with('error', 'Invalid login');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}