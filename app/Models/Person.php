<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    public const DOCUMENT_TYPES = ['CC', 'CE', 'NIT', 'PPN', 'TI', 'RUT'];

    public $timestamps = false;
    protected $table = 'persons';
}
