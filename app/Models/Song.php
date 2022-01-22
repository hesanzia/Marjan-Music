<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $table = "songs";
    protected $fillable = [
        'id', 'name', 'singer_id', 'songwriter_id', 'producer_id','composer_id','picture','Link'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function singer()
    {
        return $this->belongsTo('App\Models\Singer','singer_id', 'id')->first();
    }

    public function songwriter()
    {
        return $this->belongsTo('App\Models\Songwriter','songwriter_id', 'id')->first();
    }

    public function composer()
    {
        return $this->belongsTo('App\Models\Composer','composer_id', 'id')->first();
    }

    public function producer()
    {
        return $this->belongsTo('App\Models\Producer','producer_id', 'id')->first();
    }

}
