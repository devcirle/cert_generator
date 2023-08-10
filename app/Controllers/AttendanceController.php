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
        //return view('clienthome');
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

    public function register()
    {
        helper(['form']);

        $attendeesModel = new AttendeesModel();
        $currentDate = new \DateTime();
        $formattedDate = $currentDate->format('Y-m-d');
        
        //Random Code Generator
        $length = 4; // Desired length of the random string
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Define the characters to choose from
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        $year = $currentDate->format('Y');
        $startIndex = 2;
        $formattedYear = mb_substr($year, $startIndex);

        $uniqueCode = 'SDOIN-' . $randomString . $formattedYear;
        
        $attendeesModel->save($data);
        echo $uniqueCode;
    }

    public function eventspage()
    {
        helper(['form']);
        /*updates the attendance date of the attendee
        if the attendee attends a seminar
        */
        return view('eventspage');
    }

    public function certificates()
    {
        helper(['form']);
        /*updates the attendance date of the attendee
        if the attendee attends a seminar
        */
        return view('certificates');
    }

    public function attendance()
    {
        helper(['form']);
        /*updates the attendance date of the attendee
        if the attendee attends a seminar
        */
        return view('attendance');
    }
}
