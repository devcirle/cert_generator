<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\SeminarsModel;

class AccountController extends Controller
{
    //Loads the Sign In Page
    public function index()
    {
        helper(['form']);
        return view('signin'); //default value
        //return view('certificate_mockup');
        //return view('admin_dashboard');
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
                } else {
                    $session->set($ses_data);
                    var_dump($session->get('username')); //testing
                    return redirect()->to('dashboard');
                }
            } else {
                $session->setFlashdata('msg', 'Incorrect Password');
                return redirect()->to('home');
            }
        } else {
            $session->setFlashdata('msg', 'User does not exist.');
            return redirect()->to('home');
        }
    }

    public function login()
    {
        $session = session();
        $username = $session->get('username');
        // var_dump($username);
        $role = $session->get('role');
        // var_dump($role);
        $seminarModel = new SeminarsModel();
        $userModel = new UserModel();

        //fetch all seminars
        $data = $seminarModel->getAll();

        ////
        $ownerId = $userModel->getUserIdByUsername($username);

        $ownerData = $seminarModel->getSeminar($ownerId->id);
        ////

        $owners = [];

        foreach ($data as $item) {
            $owner = $userModel->getProgramOwnersById($item['owner']);
            $owners[] = $owner;
        }



        if ($role == 1) {
            return view('admin_dashboard', ['username' => $username, 'data' => $data, 'owners' => $owners]);
        } elseif ($role == 2) {
            return view('owner_dashboard', ['username' => $username, 'data' => $ownerData]);
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
        $userModel = new UserModel();

        $existingUsername = $userModel->where('username', $this->request->getVar('username'))->first();

        if (!$existingUsername) {
            $rules = [
                'username' => 'required|min_length[2]|max_length[50]',
                'password' => 'required|min_length[4]|max_length[50]',
                'confirmpassword' => 'matches[password]'
            ];

            if ($this->validate($rules)) {
                $userModel = new UserModel();
                $data = [
                    'name' => $this->request->getVar('name'),
                    'username' => $this->request->getVar('username'),
                    'role' => $this->request->getVar('role'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
                ];
                $userModel->save($data);
                return redirect()->to('dashboard');
            } else {
                $data['validation'] = $this->validator;
                // Store the previously inserted data in session
                $_SESSION['prev_username'] = $this->request->getVar('username');
                $_SESSION['prev_role'] = $this->request->getVar('role');
                // Load the view again and pass the data containing the error message
                return view('addAccount', $data);
            }
        } else {
            session()->setFlashdata('error_message', 'Username already exist');
        }
        return redirect()->to('addAccount');
    }

    //Sets the state of an program owner account
    public function setAccount()
    {
        helper(['form']);
        $userModel = new UserModel();
        $data = $userModel->getAllUser();

        return view('setAccount', ['data' => $data]);
    }

    public function updateAccountRole()
    {
        helper(['form']);
        $userModel = new UserModel();

        $userRoles = $this->request->getPost('role');

        if (!empty($userRoles) && is_array($userRoles)) {
            foreach ($userRoles as $userId => $role) {
                // Update user roles in the database
                $userModel->updateRole($userId, $role);
            }
            // Add a success message or redirect after updating
            echo "Updated Successfully";
        }
        return redirect()->to('dashboard');
    }

    public function updateAccountView()
    {
        helper(['form']);

        return view('accountupdate');
    }

    // public function ownerAccountUpdate($username)
    public function ownerAccountUpdate($username)
    {
        helper(['form']);

        return view('ownerAccountUpdate', ['username' => $username]);
        // return view('ownerAccountUpdate', ['username' => $username]);
    }


    public function updateAccountCredentials()
    {
        helper(['form']);
        $userModel = new UserModel();

        $oldUsername = $this->request->getVar('oldUserName');
        if ($oldUsername) {
            $toUpdate = $userModel->where('username', $oldUsername)->first();
        } else {
            $toUpdate = $userModel->where('name', $this->request->getVar('name'))->first();
        }

        $rules = [
            'username' => 'required|min_length[2]|max_length[50]',
            'password' => 'required|min_length[4]|max_length[50]',
            'confirmpassword' => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $existingUsername = $userModel->where('username', $this->request->getVar('username'))->first();
            if (!$existingUsername) {
                $data = [
                    'username' => $this->request->getVar('username'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
                ];
                $userModel->updateAccount($toUpdate['id'], $data['username'], $data['password']);
                return redirect()->to('home');

            }
        }
    }
}