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
        return view('clienthome');
    }
    public function viewseminars()
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

    function randomGenerator($characters, $length)
    {
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public function register()
    {
        helper(['form']);

        $attendeesModel = new AttendeesModel();
        $currentDate = new \DateTime();
        $formattedDate = $currentDate->format('Y-m-d');

        // Random Code Generator
        $length = 1; // Desired length of the random string
        
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Define the characters to choose from

        $year = $currentDate->format('Y');
        $startIndex = 2;
        $formattedYear = mb_substr($year, $startIndex);

        $isUnique = false;
        $uniqueCode = '';

        while (!$isUnique) {
            $uniqueCode = 'SDOIN-' . $this->randomGenerator($characters, $length) . $formattedYear;
            // Check if the unique code already exists in the model
            $existingCode = $attendeesModel->where('code', $uniqueCode)->first();
            if (!$existingCode) {
                $isUnique = true;

                $data = [
                    'seminar' => $this->request->getVar('seminar'),
                    'district' => $this->request->getVar('district'),
                    'school' => $this->request->getVar('school'),
                    'name' => $this->request->getVar('name'),
                    'position' => $this->request->getVar('position'),
                    'contact' => $this->request->getVar('contact'),
                    'gender' => $this->request->getVar('gender'),
                    'age' => $this->request->getVar('age'),
                    'pre_reg' => $formattedDate,
                    'code' => $uniqueCode
                ];

                $attendeesModel->save($data); // Found a unique code, exit the loop
            } else {
                $isUnique = true;
                echo "No more available codes";
            }
        }
    }
    public function attendance()
    {
        helper(['form']);
        
        $seminarModel = new SeminarsModel();
        $data = $seminarModel->getAll();

        return view('attendance_page', ['data' => $data]);
    }
}