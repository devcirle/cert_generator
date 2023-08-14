<?php

namespace App\Models;

use CodeIgniter\Model;

class AttendeesModel extends Model
{
    protected $table = 'attendees';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'seminar',
        'district',
        'school',
        'name',
        'position',
        'contact',
        'gender',
        'age',
        'pre_reg',
        'date',
        'code',
        'created_at'
    ];

    public function updateDateStatus($id, $newDate)
    {
        $this->where('id', $id)
            ->set('date', $newDate)
            ->update();
    }
}