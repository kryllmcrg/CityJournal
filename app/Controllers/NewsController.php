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
            $image = $this->request->getFile('ImageURL');
            // Retrieve data from the request
            $data = [

                'Title' => $this->request->getVar('Title'),
                'Author' => $this->request->getVar('Author'),
                'Category' => $this->request->getVar('Category'),
                'ImageURL' => $image->getName(),
                'Content' => $this->request->getVar('Content'),
                'PublishDate' => $this->request->getVar('PublishDate'),
                // Add other fields as needed
            ];
    
            // Validate data
            if (empty($data['Title']) || empty($data['Author']) || empty($data['Category']) || empty($data['ImageURL']) || empty($data['Content']) || empty($data['PublishDate'])) {
                return $this->respond(["error" => "Error: Required data is missing."], 400);
            }
    
            // Validation Rules
            $validationRules = [
                'Title' => 'required',
                'Author' => 'required',
                'Category' => 'required',
                'ImageURL' => 'required',
                'Content' => 'required',
                'PublishDate' => 'required',
                // Add other validation rules as needed
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
    

    public function getAdd()
    {
        $model = new NewsModel();

        $news = $model->findAll();

        return $this->respond($news);
    }
}