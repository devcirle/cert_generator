<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SeminarsModel;
use App\Models\UserModel;

class SeminarController extends Controller
{
    public function create()
    {
        helper(['form']);

        $rules = [
            'title' => 'required|min_length[2]|max_length[100]',
            'venue' => 'required|min_length[4]|max_length[100]',
        ];

        $username = $this->request->getVar('username');
        $userModel = new UserModel();
        $user = $userModel->getUserIdByUsername($username);

        if ($this->validate($rules)) {
            $seminarModel = new SeminarsModel();
            $data = [
                'owner' => $user->id,
                'title' => $this->request->getVar('title'),
                'venue' => $this->request->getVar('venue'),
                'date' => $this->request->getVar('date')
            ];
            $seminarModel->save($data);
            return redirect()->to('dashboard');
        } else {
            $data['validation'] = $this->validator;
            echo view('dashboard', $data);
        }
    }
}