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

    public function updateCertificateStatus($id, $newStatus)
    {
        $this->where('id', $id)
            ->set('status', $newStatus)
            ->update();
    }
}