<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Search extends Controller
{
    public function index()
    {
        return view('search_view');
    }

    public function perform_search()
    {
        $query = $this->request->getGet('query');

        // Load the UserModel
        $userModel = new UserModel();

        // Perform the search
        $results = $userModel->searchUsers($query);

        return $this->response->setJSON($results);
    }
}
