<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
  
class SigninController extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('signin');
    } 
  
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
                /*
                if ($data['role'] < 0) {
                    echo "Account Locked";
                } elseif ($data['role'] > 1) {
                    $session->set($ses_data);
                    return redirect()->to('ownerprofile');
                } else {
                    $session->set($ses_data);
                    return redirect()->to('adminprofile');
                }*/
                if ($data['role'] < 0) {
                    echo "Account Locked";
                } else{
                    $session->set($ses_data);
                    return redirect()->to('/dashboard');
                }
            } else {
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('signin');
            }
        } else {
            $session->setFlashdata('msg', 'User does not exist.');
            return redirect()->to('signin');
        }
    }

}