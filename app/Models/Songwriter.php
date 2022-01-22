<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Songwriter extends Model
{
    use HasFactory;

    protected $table = "songwriters";
    protected $fillable = [
        'id', 'name','nationality','age','picture','about',
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function songs()
    {
        return $this->hasMany('App\Models\Song', 'songwriter_id', 'id')->get();
    }
}
