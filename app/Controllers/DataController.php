<?php

namespace App\Controllers;

use App\Models\AttendeesModel;
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

    public function viewSeminarDetails($seminarId)
    {
        $model = new AttendeesModel();
        $data = $model->getAttendeeBySeminar($seminarId);

        return view('ownerSeminarDetails', ['data' => $data]);
    }
    
    public function viewAttendeesFullyAttended($seminarId)
    {
        $model = new CertificateModel();
        $attendeesModel = new AttendeesModel();

        $data = $model->getAttendeeByCertStatus($seminarId);

        $newData = [];

        foreach ($data as $row) {
            $attendee = $attendeesModel->find($row['attendee']);
            if ($attendee) {
                $newData[] = $attendee;
            }
        }

        return view('ownerSeminarDetails', ['data' => $newData]);
    }

    public function get_data()
    {
        $model = new SeminarsModel();
        $data = $model->getAll();

        return $this->response->setJSON($data);
    }

    public function certViewTest()
    {
        helper(['form']);
        return view('certgen');
    }

    public function getCertificate()
    {
        $seminarModel = new SeminarsModel();
        $attendeeModel = new AttendeesModel();
        $certModel = new CertificateModel();

        //SDOIN-123423
        $searchQuery = $this->request->getVar('query');
        $certificateData = $certModel->where('cert_no', $searchQuery)->first();
        var_dump($certificateData);
        

        if (!$certificateData){
            session()->setFlashdata('error_message', 'Certificate Not Available');
            return redirect()->to('cert-test');
        } elseif ($certificateData['status'] == 1) {
            $attendeeCert = $attendeeModel->where('code', $searchQuery)->first();
            $seminarData = $seminarModel->where('id', $attendeeCert['seminar'])->first();
            return view('certificate_mockup', ['data' => $attendeeCert, 'seminar' => $seminarData]);   
        }
        




    }
}