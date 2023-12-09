<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CommentModel;

class CommentController extends BaseController
{
    use ResponseTrait;

    public function submitComment()
    {
        try {
            // Validate and store the comment in the database
            $commentModel = new CommentModel();
    
            $data = [
                'name'    => $this->request->getVar('name'),
                'email'   => $this->request->getVar('email'),
                'comment' => $this->request->getVar('comment'),
            ];
    
            $commentModel->insert($data);
    
            return $this->respond(['message' => 'Comment submitted successfully']);
        } catch (\Throwable $th) {
            return $this->respond(["error" => "Error:" . $th->getMessage()]);
        }
    }
    
    public function getComments()
    {
        try {
            // Retrieve all comments from the database
            $commentModel = new CommentModel();
            $comments = $commentModel->findAll();
    
            return $this->respond($comments);
        } catch (\Throwable $th) {
            return $this->respond(["error" => "Error:" . $th->getMessage()]);
        }
    }
    
}
