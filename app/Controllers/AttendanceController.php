<?php
namespace App\Controllers;

use App\Models\SeminarsModel;
use CodeIgniter\Controller;
use App\Models\AttendeesModel;
use App\Models\UserModel;


class AttendanceController extends Controller
{
    public function index()
    {
        helper(['form']);
        //$seminarModel = new SeminarsModel();
        
        $userModel = new UserModel();
        
        $userId = 2;
        $users = $userModel->getProgramOwners($userId);
        
        //$seminars = $seminarModel->findAll();
        
        //$data['seminars'] = $seminars;
        $data['users'] = $users;

        return view('pre_reg_page', $data);
    }

    public function register()
    {
        helper(['form']);

        $attendeesModel = new AttendeesModel();
        $currentDate = new \DateTime();
        $formattedDate = $currentDate->format('Y-m-d');
        $data = [
            'seminar' => $this->request->getVar('seminar'),
            'district' => $this->request->getVar('district'),
            'school' => $this->request->getVar('school'),
            'name' => $this->request->getVar('name'),
            'position' => $this->request->getVar('position'),
            'contact' => $this->request->getVar('contact'),
            'gender' => $this->request->getVar('gender'),
            'age' => $this->request->getVar('age'),
            'pre_reg' => $formattedDate
        ];

        $attendeesModel->save($data);
        echo "Pre-registered Successfully";
    }
}