<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';

    protected $fillable = ['name', 'about', 'photo'];

    // public function siswa()
    // {
    //     return $this->belongsTo(siswa::class);
    // }

    public function project()
    {
        return $this->hasMany(Project::class);
    }

    public function contact()
    {
        return $this->hasMany(Contact::class);
    }

    public static function booted() {
        parent::boot();

        self::deleted(function ($model) {
            if (file_exists(storage_path('app/public/' . str_replace('storage/', '', $model->photo)))) {
                unlink(storage_path('app/public/' . str_replace('storage/', '', $model->photo)));
            }
        });
    }
}
