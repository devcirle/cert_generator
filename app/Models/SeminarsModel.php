<?php

namespace App\Models;

use CodeIgniter\Model;

class SeminarsModel extends Model
{
    protected $table = 'seminars';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'owner', 
        'title', 
        'date',
        'venue', 
        'created_at'
    ];
}
