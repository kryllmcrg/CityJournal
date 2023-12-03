<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\NewsModel;

class NewsController extends BaseController
{
    use ResponseTrait;

    private $Articles;

    public function add()
    {
        try {
            $newsModel = new NewsModel();
            $image = $this->request->getFile('ImageURL');
            $newName = $image->getRandomName();
            // Retrieve data from the request
            $data = [

                'Title' => $this->request->getVar('Title'),
                'Author' => $this->request->getVar('Author'),
                'Category' => $this->request->getVar('Category'),
                'ImageURL' => $newName,
                'Content' => strip_tags ($this->request->getVar('Content')),
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

            if($image->isValid() && !$image->hasMoved()){
                $image->move('./uploads',$newName);
                // Insert data into the database

                if (!$newsModel->insert($data)) {
                    // Handle insertion failure, log the error, return an error response, etc.
                    return $this->respond(["error" => "Error: Unable to insert data."]);
                }
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

    public function __construct(){
        $this->Articles = new NewsModel();
    }
    public function displayNews()
    {
        $Articles = $this->Articles->findAll();

        $baseUrl = 'http://cityjournal.test/'; // This assumes you have configured the base URL in CodeIgniter.
    
            foreach ($Articles as &$Article) {
                $Article['ImageURL'] = $baseUrl . 'uploads/' . $Article['ImageURL'];
            }

        return $this->respond($Articles);
    }
    

    public function getAdd()
    {
        $model = new NewsModel();

        $news = $model->findAll();

        return $this->respond($news);
    }

    public function changeNewsStatus(){
        try {
            $articleID = $this->request->getVar('ArticleID');
            $status = $this->request->getVar('Status');

            $data['Status'] = $status;

            $model = new NewsModel();
            $model->where('ArticleID', $articleID)->set($data)->update();

            return $this->respond([$data,$articleID]);
        } catch (\Throwable $th) {
            return $this->respond(['message' => 'Error: '.$th->getMessage()]);
        }
    }
}