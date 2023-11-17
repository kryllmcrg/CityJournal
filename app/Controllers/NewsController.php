<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\NewsModel;
use \Firebase\JWT\JWT;

class NewsController extends BaseController
{
    use ResponseTrait;

    public function create()
{
    try {
        $newsModel = new NewsModel();

        // Retrieve data from the request
        $data = [
            'Title' => $this->request->getVar('Title'),
            'Author' => $this->request->getVar('Author'),
            'Category' => $this->request->getVar('Category'),
            'Image' => $this->request->getVar('Image'),
            'Stories' => $this->request->getVar('Stories'),
            // Add other fields as needed
        ];

        // Validate data
        if (empty($data['Title']) || empty($data['Author']) || empty($data['Category']) || empty($data['Image']) || empty($data['Stories'])) {
            return $this->respond(["error" => "Error: Required data is missing."], 400);
        }

        // Insert data into the database
        $newsModel->insert($data);

        $response = [
            'message' => 'News created successfully',
        ];

        return $this->respondCreated($response);
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