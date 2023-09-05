<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function contact_type()
    {
        return $this->belongsTo(ContactType::class);
    }

    public function siswa()
    {
        return $this->belongsTo(siswa::class);
    }
}
