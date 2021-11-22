<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Person extends Model
{
    use HasFactory;

    public const DOCUMENT_TYPES = ['CC', 'CE', 'NIT', 'PPN', 'TI', 'RUT'];

    public $timestamps = false;
    protected $table = 'persons';
    protected $guarded = [];

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

    public function toResponse(): array
    {
        return [
            'name' => $this->name,
            'surname' => $this->surname,
            'documentType' => $this->document_type,
            'document' => $this->document_number,
            'email' => $this->securedEmail(),
            'mobile' => $this->securedMobile(),
        ];
    }

    public function securedEmail(): string
    {
        list($user, $domain) = explode('@', $this->email);

        return Str::of($user)->mask('*', -3)->append('@' . $domain);
    }

    public function securedMobile(): string
    {
        return Str::mask($this->mobile, '*', 3, 3);
    }
}
