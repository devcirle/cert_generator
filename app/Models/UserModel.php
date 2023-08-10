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

    public function getAllUser()
    {
        return $this->findAll();
    }

    public function getProgramOwners($role)
    {
        return $this->where('role', $role)->findAll();
    }

    public function updateRole($id, $newRole)
    {
        $this->where('id', $id)
            ->set('role', $newRole)
            ->update();
    }
}