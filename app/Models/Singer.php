<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    use HasFactory;

    protected $table = "singers";
    protected $fillable = [
        'id', 'name','nationality','age','picture','about',
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function songs()
    {
        return $this->hasMany('App\Models\Song', 'singer_id', 'id')->get();
    }
}
