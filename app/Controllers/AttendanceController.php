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

        $certModel->save($certData);

    }

    public function attendanceView()
    {
        helper(['form']);
        return view('attendance');
    }

    public function doAttendance()
    {
        helper(['form']);
        $attendeeModel = new AttendeesModel();
        $seminarModel = new SeminarsModel();

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

                //checks if the current date is on the seminar date and if the current date isn't already in the attendance date status
                //then append the current date to attendee attendance date

                if (in_array($formattedCurrentDate, $seminarDate)) {
                    if (!strpos($attendeeDateStatus, $formattedCurrentDate)) {

                        $newDate = $attendee['date'] . '"' . $formattedCurrentDate . '"' . ',';

                        $attendeeModel->updateDateStatus($attendee['id'], $newDate);

                        echo "Updated Successfully";
                        echo "Attended successfully";
                    } else {
                        echo "Already attended on this date.";
                    }
                } else {
                    echo "Date not on seminar date";
                }
            } else {
                echo "Seminar is either upcoming or cancelled";
            }
        } else {
            echo "Account not available";
        }

        //updates the certificate status of the attendee if the seminar has already ended
        if ($seminar['status'] == 0) {

        }

    }

    public function eventspage()
    {
        helper(['form']);
        $userModel = new UserModel();
        $userData = $userModel->getAllUser();

        $seminarModel = new SeminarsModel();
        $seminars = $seminarModel->getAll();

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
