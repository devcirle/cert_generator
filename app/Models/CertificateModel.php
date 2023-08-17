<?php

namespace App\Models;

use CodeIgniter\Model;

class CertificateModel extends Model
{
    protected $table = 'certificate';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'status',
        'seminar',
        'attendee',
        'cert_no'
    ];

    public function updateCertificateStatus($code, $newStatus)
    {
        $this->where('cert_no', $code)
            ->set('status', $newStatus)
            ->update();
    }

    public function getAttendeeByCertStatus($seminarId){
        return $this->where('status', 1)
                    ->where('seminar', $seminarId)
                    ->findAll();
    }
}