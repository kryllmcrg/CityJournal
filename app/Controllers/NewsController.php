<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\NewsModel;

class NewsController extends BaseController
{
    use ResponseTrait;

    public function add()
    {
        try {
            $newsModel = new NewsModel();
            $image = $this->request->getFile('Image');
            // Retrieve data from the request
            $data = [
                'title' => $this->request->getVar('Title'),
                'author' => $this->request->getVar('Author'),
                'category' => $this->request->getVar('Category'),
                'image' => $image->getName(),
                'stories' => $this->request->getVar('Stories'),
                // Add other fields as needed
            ];
    
            // Validate data
            if (empty($data['title']) || empty($data['author']) || empty($data['category']) || empty($data['image']) || empty($data['stories'])) {
                return $this->respond(["error" => "Error: Required data is missing."], 400);
            }
    
            // Validation Rules
            $validationRules = [
                'title' => 'required',
                'author' => 'required',
                'category' => 'required',
                'image' => 'required',
                'stories' => 'required',
                // Add other validation rules as needed
            ];
    
            // Set validation rules
            $newsModel->setValidationRules($validationRules);
    
            // Insert data into the database
            if (!$newsModel->insert($data)) {
                // Handle insertion failure, log the error, return an error response, etc.
                return $this->respond(["error" => "Error: Unable to insert data."], 500);
            }
    
            $response = [
                'message' => 'News created successfully',
            ];
    
            return $this->respond($response, 200);
        } catch (\Throwable $th) {
            return $this->respond(["error" => "Error: " . $th->getMessage()], 500);
        }
    }
    

    public function getAdd()
    {
        $model = new NewsModel();

        $news = $model->findAll();

        return $this->respond($news);
    }
}