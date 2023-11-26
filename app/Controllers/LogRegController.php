<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\AccountModel;
use \Firebase\JWT\JWT;

class LogRegController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        //
    }

      
    public function login()
    {
        try {
            $accountModel = new AccountModel();
    
            $Email = $this->request->getVar('Email');
            $Password = $this->request->getVar('Password');
            
            $user = $accountModel->where('Email', $Email)->first();
    
            if(is_null($user)) {
                return $this->respond(['error' => 'Invalid Email or Password.'], 401);
            }
    
            $pwd_verify = Password_verify($Password, $user['Password']);
    
            if(!$pwd_verify) {
                return $this->respond(['error' => 'Invalid Email or Password.'], 401);
            }
    
            $key = getenv('JWT_SECRET');
            $iat = time(); // current timestamp value
            $exp = $iat + 3600;
    
            $payload = array(
                "iss" => "Issuer of the JWT",
                "aud" => $user['Role'],
                "sub" => "Subject of the JWT",
                "iat" => $iat, //Time the JWT issued at
                "exp" => $exp, // Expiration time of token
                "Email" => $user['Email'],
            );
            
            $token = JWT::encode($payload, $key, 'HS256');
    
            $response = [
                'message' => 'Login Succesful',
                'token' => $token
            ];
            
            return $this->respond($response, 200);
        } catch (\Throwable $th) {
            return $this->respond(["error" => "Error".$th]  );
        }
    }

    public function register()
    {
        try {
            $rules = [

                'FirstName' => ['rules' => 'required|min_length[2]|max_length[255]'],
                'LastName' => ['rules' => 'required|min_length[2]|max_length[255]'],
                'Username' => ['rules' => 'required|min_length[4]|max_length[255]|is_unique[users.username]'],
                'Email' => ['rules' => 'required|min_length[4]|max_length[255]|valid_email|is_unique[users.email]'],
                'Role' => ['rules' => 'required|in_list[Admin,User,Guest]'],
                'Password' => ['rules' => 'required|min_length[8]|max_length[255]'],
                'confirm_password' => ['label' => 'Confirm Password', 'rules' => 'matches[Password]'],
            ];
                
      
            if($this->validate($rules)){
                $model = new AccountModel();
                $data = [
                    'FirstName' => $this->request->getVar('FirstName'),
                    'LastName'  => $this->request->getVar('LastName'),
                    'Role'       => $this->request->getVar('Role'),
                    'Username'   => $this->request->getVar('Username'),
                    'Email'      => $this->request->getVar('Email'),
                    'Password'   => password_hash($this->request->getVar('Password'), PASSWORD_DEFAULT)
                ];
                $model->save($data);
                 
                return $this->respond(['message' => 'Registered Successfully'], 200);
            }else{
                $response = [
                    'errors' => $this->validator->getErrors(),
                    'message' => 'Invalid Inputs'
                ]; 
                return $this->fail($response , 409);
                 
            }
        } catch (\Throwable $th) {
            return $this->respond(["error" => "Error".$th->getMessage()]  );
        }
    }

    public function getUserAccounts(){
        $model = new AccountModel();

        $userAccounts = $model->findAll();

        return $this->respond($userAccounts);
    }
  
}
