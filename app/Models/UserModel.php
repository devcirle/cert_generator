<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'username', 
        'password', 
        'role', 
        'created_at'
    ];

    public function getUserIdByUsername($username)
    {
        return $this->where('username', $username)->get()->getRow();
    }
}
