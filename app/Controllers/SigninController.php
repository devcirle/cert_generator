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
                'isLoggedIn' => true
            ];
            // admin account pre-added
            
            if ($data['role'] < 0) {
                echo "Account Locked";
            } elseif ($data['role'] > 1) {
                $session->set($ses_data);
                return redirect()->to('public/ownerprofile');
            } else {
                $session->set($ses_data);
                return redirect()->to('public/adminprofile');
            }
            

            /*
            // Check the role of the user
            if ($data['role'] === 'Admin') {
                $session->set($ses_data);
                return redirect()->to('public/adminprofile');
            } elseif ($data['role'] === 'Program Owner') {
                $session->set($ses_data);
                return redirect()->to('public/ownerprofile');
            }
            */
        } else {
            $session->setFlashdata('msg', 'Password is incorrect.');
            return redirect()->to('public/signin');
        }
    } else {
        $session->setFlashdata('msg', 'User does not exist.');
        return redirect()->to('public/signin');
    }
}

}