<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    use HasFactory;


    protected $casts = [
        'bigining_date' => 'datetime',
        'ending_date' => 'datetime',
    ];



    public function archive()
    {
        return $this->hasOne(Archive::class);
    }
}
