<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class AccountController extends Controller
{
    //Loads the Sign In Page
    public function index()
    {
        helper(['form']);
        return view('signin'); //default value
        //return view('certificate_mockup');
    }

    //Checks if the Account used is Admin or Program Owner
    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = $userModel->where('username', $username)->first();

        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);

            if ($authenticatePassword) {
                $ses_data = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'role' => $data['role'],
                    'isLoggedIn' => true
                ];

                if ($data['role'] < 0) {
                    echo "Account Locked";
                } else{
                    $session->set($ses_data);
                    return redirect()->to('dashboard');
                }

            } else {
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('dashboard');
            }
        } else {
            $session->setFlashdata('msg', 'User does not exist.');
            return redirect()->to('dashboard');
        }
    }

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

    //Directs to the Admin/Program Owner account creation
    public function addAccount()
    {
        helper(['form']);
        $data = [];
        return view('addAccount', $data);
    }

    //Registers the newly created account
    public function storeAccount()
    {
        helper(['form']);
        $rules = [
            'username' => 'required|min_length[2]|max_length[50]',
            'password' => 'required|min_length[4]|max_length[50]',
            'confirmpassword' => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $userModel = new UserModel();
            $data = [
                'username' => $this->request->getVar('username'),
                'role' => $this->request->getVar('role'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);
            return redirect()->to('home');
        } else {
            $data['validation'] = $this->validator;
            // Store the previously inserted data in session
            $_SESSION['prev_username'] = $this->request->getVar('username');
            $_SESSION['prev_role'] = $this->request->getVar('role');
            // Load the view again and pass the data containing the error message
            return view('addAccount', $data);
        }
    }
}