<?php

namespace App\Controllers;

use App\Models\SeminarsModel;
use App\Models\UserModel;
use App\Models\CertificateModel;


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

    public function getCertificate()
    {
        // $seminarModel = new SeminarsModel();
        $certModel = new CertificateModel();

        //SDOIN-123423
        $searchQuery = $this->request->getVar('query');
        $certificateData = $certModel->where('cert_no', $searchQuery)->first();

        if ($certificateData['status'] == 1) {
            echo "Certificate available";
            echo "Generate the Certificate";
        } else {
            echo "Certificate Not Available";
        }




    }
}