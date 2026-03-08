<?php

namespace App\Models;

use CodeIgniter\Model;

class RecordModel extends Model
{
    protected $table = 'records';

    protected $allowedFields = [
        'title',
        'description',
        'status',
        'category',
        'created_at',
        'updated_at'
    ];
}