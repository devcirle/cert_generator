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
        echo view('owner_signup', $data);
        //echo view('newsignup', $data);
        //echo view('pre_reg_page', $data);
    }
    public function adminsignup()
    {
        helper(['form']);
        $data = [];
        echo view ('signup', $data);
    }
    
    public function store()
    {
        helper(['form']);
        $rules = [
            'username'          => 'required|min_length[2]|max_length[50]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]'
        ];
          
        if($this->validate($rules)){
            $userModel = new UserModel();
            $data = [
                'username'     => $this->request->getVar('username'),
                'role'    => $this->request->getVar('role'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);
            return redirect()->to('public/signin');
        }else{
            $data['validation'] = $this->validator;
            echo view('signup', $data);
        }
          
    }
  
}