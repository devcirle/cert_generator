<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
  
class ProfileController extends Controller
{
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
        return view('program_owner_dashboard copy', ['username' => $username]);
    }
}