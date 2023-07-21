<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

//use CodeIgniter\Database\ConnectionInterface;


class DataController extends BaseController
{
    //private $db;

    //public function __construct(ConnectionInterface $db)
    //{
    //    $this->db = $db;
    //}


    public function index()
    {
        return view('login_page');
    }
   
    public function login_view()
    {
        return view('admin_dashboard');
    }

    public function register_view()
    {
        $usermodel = new UserModel();
        $user = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'role' => $this->request->getPost('role')
        ];

        $usermodel->insert($user);
        print_r($user);

        //return view('register_page');
    }
    
    public function register()
    {
        /*
        
        $user = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'role' => $this->request->getPost('role')
        ];
        
        $usermodel->save($user);
        

        if ($register)
        {
            echo "Registered Successfully";
        } else
        {
            echo "Error";
        }
        */

    }

}
