<?php

namespace App\Models;

use CodeIgniter\Model;

class SeminarsModel extends Model
{
    // SEMINAR STATUS
    // 0 ended
    // 1 upcoming
    // 2 on going
    // 3 cancelled

    protected $table = 'seminars';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'owner',
        'status',
        'title',
        'date',
        'venue',
        'created_at'
    ];

    public function getSeminarIdBySeminar($seminar)
    {
        return $this->where('title', $seminar)->get()->getRow();
    }

    public function getData($id)
    {
        return $this->where('id', $id)->findAll();
    }

    public function getSeminar($owner)
    {
        return $this->where('owner', $owner)->findAll();
    }

    public function getAll()
    {
        return $this->findAll();
    }

    public function getAllUpcomingSeminar(){
        return $this->where('status', 1)->findAll();
    }

    public function getAllOnGoingSeminar(){
        return $this->where('status', 2)->findAll();
    }

    public function updateStatusToCancelled($id)
    {
        $this->where('id', $id)
            ->set('status', 3)
            ->update();
    }

    public function updateStatusToOngoing($id)
    {

        $this->where('id', $id)
            ->set('status', 2)
            ->update();
    }

    public function updateStatusToEnded($id)
    {
        $this->where('id', $id)
            ->set('status', 0)
            ->update();
    }
}