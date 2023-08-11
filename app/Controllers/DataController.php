<?php

namespace App\Controllers;

use App\Models\SeminarsModel;

class DataController extends BaseController
{
    public function index()
    {
        $model = new SeminarsModel();
        $data = $model->getAll();

        return view('admin_dashboard', ['data' => $data]);
    }
    public function get_data()
    {
        $model = new SeminarsModel();
        $data = $model->getAll();

        return $this->response->setJSON($data);
    }
}