<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    use HasFactory;
    protected $table = "producers";
    protected $fillable = [
        'id', 'name','nationality','age','picture','about',
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function songs()
    {
        return $this->hasMany('App\Models\Song', 'producer_id', 'id')->get();
    }
}
