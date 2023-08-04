<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class SignupController extends Controller
{ 
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view ('new_register', $data);
    }
    
    public function store()
    {
        helper(['form']);
        $rules = [
            'username' => 'required|min_length[2]|max_length[50]',
            'password' => 'required|min_length[4]|max_length[50]',
            'confirmpassword' => 'matches[password]'
        ];
          
        if($this->validate($rules)){
            $userModel = new UserModel();
            $data = [
                'username'     => $this->request->getVar('username'),
                'role'    => $this->request->getVar('role'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);
            return redirect()->to('home');
        }else{
            $data['validation'] = $this->validator;
            // Store the previously inserted data in session
            $_SESSION['prev_username'] = $this->request->getVar('username');
            $_SESSION['prev_role'] = $this->request->getVar('role');
            // Load the view again and pass the data containing the error message
            return view('new_register', $data);
        }
    }
}