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
    
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            
            $user = $accountModel->where('username', $username)->first();
    
            if(is_null($user)) {
                return $this->respond(['error' => 'Invalid username or password.'], 401);
            }
    
            $pwd_verify = password_verify($password, $user['password']);
    
            if(!$pwd_verify) {
                return $this->respond(['error' => 'Invalid username or password.'], 401);
            }
    
            $key = getenv('JWT_SECRET');
            $iat = time(); // current timestamp value
            $exp = $iat + 3600;
    
            $payload = array(
                "iss" => "Issuer of the JWT",
                "aud" => "Audience that the JWT",
                "sub" => "Subject of the JWT",
                "iat" => $iat, //Time the JWT issued at
                "exp" => $exp, // Expiration time of token
                "username" => $user['username'],
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
                'username' => ['rules' => 'required|min_length[4]|max_length[255]   |is_unique[log_reg.username]'],
                'email' => ['rules' => 'required|min_length[4]|max_length[255]|valid_email|is_unique[log_reg.email]'],
                'password' => ['rules' => 'required|min_length[8]|max_length[255]'],
                'confirm_password'  => [ 'label' => 'confirm password', 'rules' => 'matches[password]']
            ];
                
      
            if($this->validate($rules)){
                $model = new AccountModel();
                $data = [
                    'username'    => $this->request->getVar('username'),
                    'email'    => $this->request->getVar('email'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
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
