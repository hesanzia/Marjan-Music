<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Composer extends Model
{
    use HasFactory;
    protected $table = "composers";
    protected $fillable = [
        'id', 'name','nationality','age','picture','about',
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function songs()
    {
        return $this->hasMany('App\Models\Song', 'composer_id', 'id')->get();
    }
}
