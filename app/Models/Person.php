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

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'surname' => $this->surname,
            'documentType' => $this->document_type,
            'document' => $this->document_number,
            'email' => $this->email,
            'mobile' => $this->mobile,
        ];
    }
}
