<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class ProfileController extends Controller
{
    public function login()
    {
        $session = session();
        $username = $session->get('username');
        $role = $session->get('role');

        if ($role == 1) {
            return view('admin_dashboard', ['username' => $username]);
        } elseif ($role == 2) {
            return view('owner_dashboard', ['username' => $username]);
        } else {
            echo "Account Locked";
        }
    }
    /*
    public function admin()
    {
        //admin dashboard
        $session = session();
        $username = $session->get('username');

        return view('admin_dashboard', ['username' => $username]);
    }

    public function owner()
    {   
        $session = session();
        $username = $session->get('username');
        $role = $session->get('role');
        if ($role == 1){
            return view('owner_dashboard', ['username' => $username]);
        }
    }
    */
}