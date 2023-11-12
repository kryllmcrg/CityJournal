<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Restful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\LogModel;
use App\Models\RegModel;

class MainController extends ResourceController
{
    public function index()
    {
        //
    }
    
    public function register()
    {
        $request = $this->request;

        // Validate input
        $validationRules = [
            'username' => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
        ];

        if (!$this->validate($validationRules)) {
            return $this->fail($this->validator->getErrors(), 400);
        }

        $RegModel = new RegModel();
        $RegModel->save([
            'username' => $request->getVar('username'),
            'email' => $request->getVar('email'),
            'password' => password_hash($request->getVar('password'), PASSWORD_BCRYPT),            
        ]);

        return $this->respond(['message' => 'Registration successful'], 201);
    }

    public function login()
    {
        $request = $this->request;
    
        // Validate input
        $validationRules = [
            'username' => 'required|valid_username',
            'password' => 'required|min_length[6]',
        ];        
    
        if (!$this->validate($validationRules)) {
            // Log validation errors for debugging
            log_message('error', 'Validation Errors: ' . print_r($this->validator->getErrors(), true));
    
            return $this->fail($this->validator->getErrors(), 400);
        }

        $LogModel = new LogModel();
        $user = $LogModel->getUserByUsername($request->getPost('username'));
        
        if (!$user || !password_verify($request->getPost('password'), $user['password'])) {
            return $this->fail('Invalid password', 401);
        }
    
        return $this->respond(['message' => 'Login successful'], 200);
    }
    
}