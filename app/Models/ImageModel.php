<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageModel extends Model
{
    protected $table = 'data';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'image_name',
        'image_data',
    ];
}
