<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrailerTimming extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function trailer()
    {
        return $this->belongsTo(Trailer::class,'trailer_id','id');
    }
}
