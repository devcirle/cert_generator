<?php

namespace App\Controllers;

use App\Models\AttendeesModel;
use App\Models\SeminarsModel;
use App\Models\UserModel;
use App\Models\CertificateModel;
use App\Models\ImageModel;


class DataController extends BaseController
{
    public function viewAllOwners()
    {
        $userModel = new UserModel();
        $data = $userModel->getAllUser();

        return view('viewOwners', ['data' => $data]);
    }



    public function viewSeminarDetails($seminarId)
    {
        $model = new AttendeesModel();
        $seminarModel = new SeminarsModel();
        $data = $model->getAttendeeBySeminar($seminarId);

        $seminarData = $seminarModel->getSeminarTitle($seminarId);
        $title = $seminarData['title'];

        return view('ownerSeminarDetails', ['data' => $data, 'title' => $title]);
    }

    public function viewSeminarByOwner($id)
    {
        $model = new SeminarsModel();
        $data = $model->getSeminar($id);

        return view('viewSeminars', ['data' => $data]);
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
        $imageModel = new ImageModel();

        //SDOIN-123423
        $searchQuery = $this->request->getVar('query');
        $certificateData = $certModel->where('cert_no', $searchQuery)->first();

        $imageData = $imageModel->first();
        $imageName = $imageData['name'];
        $imagePath = 'signature/' . $imageName;

        if (!$certificateData) {
            session()->setFlashdata('error_message', 'Certificate Not Available');
            return redirect()->to('cert-test');
        } elseif ($certificateData['status'] == 0) {
            session()->setFlashdata('error_message', 'Certificate Not Available');
            return redirect()->to('cert-test');
        } elseif ($certificateData['status'] == 1) {
            $attendeeCert = $attendeeModel->where('code', $searchQuery)->first();
            $seminarData = $seminarModel->where('id', $attendeeCert['seminar'])->first();
            return view('certificate', ['data' => $attendeeCert, 'seminar' => $seminarData, 'signature' => $imagePath, 'sds' => $imageData['sds']]);
        }
    }

    public function updateDataView()
    {
        helper(['form']);
        return view('updateData');
    }

    public function uploadImage()
    {

        helper(['form', 'url']);

        $db = \Config\Database::connect();
        $builder = $db->table('data');

        $validated = $this->validate([
            'data' => [
                'uploaded[data]',
                'mime_in[data,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[data,4096]',
            ],
        ]);

        $msg = 'Please select a valid file';

        if ($validated) {
            $avatar = $this->request->getFile('data');
            $avatar->move(FCPATH . 'signature');

            $data = [
                'sds' => $this->request->getVar('name'),
                'name' => $avatar->getClientName(),
                'type' => $avatar->getClientMimeType()
            ];

            $save = $builder->insert($data);
            $msg = 'File has been uploaded';
        }
        return redirect()->to('home');
    }
}