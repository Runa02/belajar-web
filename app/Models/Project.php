<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['siswa_id' ,'project_name', 'project_date', 'photo'];

    public function siswa()
    {
        return $this->belongsTo(siswa::class);
    }
}
