<?php
namespace App\Controllers;

use App\Models\SeminarsModel;
use CodeIgniter\RESTful\ResourceController;

class Api extends ResourceController
{
    public function getUserSeminars($id)
    {
        $seminarModel = new SeminarsModel();
        $seminars = $seminarModel->where('owner', $id)->findAll();

        return $this->respond($seminars); // Ensure that $seminars is an array
    }
}
