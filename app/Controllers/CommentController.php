<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CommentModel;

class CommentController extends BaseController
{
    public function comment()
    {
        try {
            $newsModel = new CommentModel();
            $data = [

                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'comment' => $this->request->getVar('comment'),
            ];
    
            // Validate data
            if (empty($data['name']) || empty($data['email']) || empty($data['comment']) ) {
                return $this->respond(["error" => "Error: Required data is missing."], 400);
            }
    
            // Validation Rules
            $validationRules = [
                'name' => 'required',
                'email' => 'required',
                'comment' => 'required',
            ];
    
            // Set validation rules
            $newsModel->setValidationRules($validationRules);
    
            // Insert data into the database
            if (!$newsModel->insert($data)) {
                // Handle insertion failure, log the error, return an error response, etc.
                return $this->respond(["error" => "Error: Unable to insert data."]);
            }

            // $newsModel->insert($data);
    
            $response = [
                'message' => 'News created successfully',
                $data
            ];
    
            return $this->respond($response, 200);
        } catch (\Throwable $th) {
            return $this->respond(["error" => "Error: " . $th->getMessage()]);
        }
    }
}
