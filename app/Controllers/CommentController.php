<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CommentModel;

class CommentController extends BaseController
{
    use ResponseTrait;

    public function comment()
    {
        try {
            $commentModel = new CommentModel();
            $data = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'comment' => $this->request->getVar('comment'),
            ];

            // Validate data
            $validationRules = [
                'name' => 'required',
                'email' => 'required|valid_email',
                'comment' => 'required',
            ];

            // Set validation rules
            $commentModel->setValidationRules($validationRules);

            // Validate the data
            if (!$commentModel->validate($data)) {
                return $this->fail($commentModel->errors(), 400);
            }

            // Insert data into the database
            if (!$commentModel->insert($data)) {
                // Handle insertion failure, log the error, return an error response, etc.
                return $this->fail("Error: Unable to insert data.", 500);
            }

            $response = [
                'message' => 'Comment created successfully',
                'data' => $data,
            ];

            return $this->respond($response, 200);
        } catch (\Throwable $th) {
            return $this->fail("Error: " . $th->getMessage(), 500);
        }
    }
}
