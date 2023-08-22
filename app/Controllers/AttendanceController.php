<?php

namespace App\Controllers;

use App\Models\SeminarsModel;
use CodeIgniter\Controller;
use App\Models\AttendeesModel;
use App\Models\UserModel;
use App\Models\CertificateModel;

class AttendanceController extends Controller
{

    public function index()
    {
        return view('clienthome');
    }

    public function viewseminars()
    {
        helper(['form']);

        $data = [
            'seminarId' =>  $this->request->getVar('id')
        ];

        return view('pre_reg_page', ['data' => $data]);
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
        $certModel = new CertificateModel();
        $seminarModel = new SeminarsModel();
        $currentDate = new \DateTime();
        $formattedDate = $currentDate->format('Y-m-d');

        // Random Code Generator
        $length = 4; // Desired length of the random string

        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Define the characters to choose from

        $year = $currentDate->format('Y');
        $startIndex = 2;
        $formattedYear = mb_substr($year, $startIndex);

        $isUnique = false;

        $seminarTitle = $this->request->getVar('seminar');
        $attendeeName = $this->request->getVar('name');

        while (!$isUnique) {
            $uniqueCode = 'SDOIN-' . $this->randomGenerator($characters, $length) . $formattedYear;
            // Check if the unique code already exists in the model
            $existingCode = $attendeesModel->where('code', $uniqueCode)->first();
            if (!$existingCode) {
                $isUnique = true;

                $data = [
                    'seminar' => $seminarTitle,
                    'district' => $this->request->getVar('district'),
                    'school' => $this->request->getVar('school'),
                    'name' => $attendeeName,
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


        $certData = [
            'seminar' => $seminarTitle,
            'attendee' => $attendeesModel->getAttendeeIdByAttendeeName($uniqueCode),
            'cert_no' => $uniqueCode,
            'status' => 0
        ];

        // Storing $certData in the session before the redirect
        session()->set('cert_data', $certData);

        $certModel->save($certData);
        // Performing the redirect
        return redirect()->to('success');


        // return view('preregSuccess', ['data' => $certData]);

    }

    public function preRegSuccess()
    {
        // Retrieving $certData from the session after the redirect
        $certData = session('cert_data');

        // Now you can use $certData in your new view or controller action
        return view('preregSuccess', ['data' => $certData]);
    }

    public function attendanceView()
    {
        helper(['form']);
        return view('attendance');
    }

    public function doAttendance()
    {
        // $session = session();
        helper(['form']);
        $attendeeModel = new AttendeesModel();
        $seminarModel = new SeminarsModel();
        $certModel = new CertificateModel();

        $currentDate = new \DateTime();
        $formattedCurrentDate = $currentDate->format('Y-m-d');

        $first = $this->request->getVar('first');
        $second = $this->request->getVar('second');
        $third = $this->request->getVar('third');
        $fourth = $this->request->getVar('fourth');
        $fifth = $this->request->getVar('fifth');
        $sixth = $this->request->getVar('sixth');

        //concatenate the uniquecode
        $attendanceCode = 'SDOIN-' . $first . $second . $third . $fourth . $fifth . $sixth;

        $attendee = $attendeeModel->where('code', $attendanceCode)->first();


        if ($attendee) {
            $attendeeDateStatus = $attendee['date'];
            $seminarNum = $attendee['seminar'];
            //gets the seminar row
            $seminar = $seminarModel->where('id', $seminarNum)->first();
            // 0 ended
            // 1 upcoming
            // 2 on going
            // 3 cancelled
            if ($seminar['status'] == 2) {
                //can attend seminar
                $seminarDate = json_decode($seminar['date']);

                if (in_array($formattedCurrentDate, $seminarDate)) {
                    if (!strpos($attendeeDateStatus, $formattedCurrentDate)) {

                        $newDate = $attendee['date'] . '"' . $formattedCurrentDate . '"' . ',';

                        $attendeeModel->updateDateStatus($attendee['id'], $newDate);

                        $certDateStatus = substr($newDate, 0, -1);
                        $newCertDateStatus = '[' . $certDateStatus . ']';

                        if ($newCertDateStatus == $seminar['date']) {
                            echo $attendanceCode;
                            $certModel->updateCertificateStatus($attendanceCode, 1);
                        }
                        session()->setFlashdata('success_message', 'Attended Successfully');
                    } else {
                        session()->setFlashdata('success_message', 'Already attended on this date');
                    }
                }
            } else {
                session()->setFlashdata('error_message', 'Seminar is either upcoming, cancelled or has already ended');
            }
        } else {
            session()->setFlashdata('error_message', 'Account not available');
        }
        
        return redirect()->to('attendance');

    }

    public function eventspage()
    {
        helper(['form']);
        $userModel = new UserModel();        
        $userData = $userModel->getAllUser();

        $seminarModel = new SeminarsModel();
        $currentDate = new \DateTime();
        $formattedCurrentDate = $currentDate->format('Y-m-d');

        $upcomingSeminar = $seminarModel->getAllUpcomingSeminar();
        $ongoingSeminar = $seminarModel->getAllOnGoingSeminar();
        

        $seminars = $seminarModel->getAllUpcomingSeminar();

        $allSeminars = $seminarModel->getAll();

        foreach ($allSeminars as $seminarData){
            if ($seminarData['status'] == 1){
                $newData = json_decode($seminarData['date'], true); // Decode as an associative array
                if (is_array($newData) && (in_array($formattedCurrentDate, $newData) || (!empty($newData) && $formattedCurrentDate == $newData[0]))) {
                    $seminarModel->updateStatusToOngoing($seminarData['id']);
                }
            } elseif ($seminarData['status'] == 2){
                $dateArray = json_decode($seminarData['date']);
            
                $endDate = end($dateArray);
                if ($formattedCurrentDate > $endDate){
                    $seminarModel->updateStatusToEnded($seminarData['id']);
                }
            }
        }

        foreach ($seminars as &$seminar) {
            $userKey = array_search($seminar['owner'], array_column($userData, 'id'));

            $seminar['registeredBy'] = $userData[$userKey]['username'];
        }

        return view('eventspage', ['seminars' => $seminars, 'user' => $userData]);
    }

    public function certificates()
    {
        helper(['form']);
        /*updates the attendance date of the attendee	
        if the attendee attends a seminar	
        */
        return view('certificate_mockup');
    }
}