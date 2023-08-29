<?php

namespace App\Controllers;

use App\Models\AttendeesModel;
use App\Models\SeminarsModel;
use App\Models\UserModel;
use App\Models\CertificateModel;
use App\Models\ImageModel;


class DataController extends BaseController
{
    public function viewAllOwners(){
        $userModel = new UserModel();
        $data = $userModel->getAllUser();

        return view('viewOwners', ['data' => $data]);
    }



    public function viewSeminarDetails($seminarId)
    {
        $model = new AttendeesModel();
        $data = $model->getAttendeeBySeminar($seminarId);

        return view('ownerSeminarDetails', ['data' => $data]);
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

        //SDOIN-123423
        $searchQuery = $this->request->getVar('query');
        // var_dump($searchQuery);
        $certificateData = $certModel->where('cert_no', $searchQuery)->first();
        // var_dump($certificateData);


        if (!$certificateData) {
            session()->setFlashdata('error_message', 'Certificate Not Available');
            return redirect()->to('cert-test');
        } elseif ($certificateData['status'] == 1) {
            $attendeeCert = $attendeeModel->where('code', $searchQuery)->first();
            $seminarData = $seminarModel->where('id', $attendeeCert['seminar'])->first();
            return view('certificate', ['data' => $attendeeCert, 'seminar' => $seminarData]);
        }
    }

    public function updateDataView()
    {
        helper(['form']);
        return view('updateData');
    }
    // Create a controller method to handle image upload
    public function uploadImage()
    {
        // helper(['form']);
        // if ($this->request->getMethod() === 'post' && $this->validate(['image' => 'uploaded[image]|max_size[image,1024]'])) {
        if ($this->request->getMethod() === 'post') {
            $image = $this->request->getFile('image');

            // if ($image->isValid() && !$image->hasMoved()) {
            if (!$image->hasMoved()) {
                $newName = $image->getRandomName();
                $image->move('public\images\signature', $newName);

                // Save image details to the database
                $imageModel = new ImageModel(); // Replace with your model
                $imageModel->save([
                    'image_name' => $newName,
                    'image_data' => '' . $newName,
                ]);

                // return redirect()->to('/success'); // Redirect after successful upload
            }
        }

        // return view('updateData'); // Display upload form view
    }
}
