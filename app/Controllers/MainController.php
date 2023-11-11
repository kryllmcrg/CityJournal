<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RestFul\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\MainModel;

class MainController extends ResourceController
{
    public function index()
    {
        //
    }
    public function login()
    {
        $json = $this->request->getJSON();
        $data =[
            'username' => $json->username,
            'password' => $json->password,
        ];
        $main = new MainModel();
        $r =$main->login($data);
        return $this->respond($r, 200);
    }
    public function getData()
    {
        $main = new MainModel();
        $data = $main->findAll();
        return $this->respond($data);
    }
}
