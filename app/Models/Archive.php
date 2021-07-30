<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    public function edition()
    {
        return $this->belongsTo(Edition::class);
    }

    public function archivepic()
    {
        return $this->hasMany(Archivepic::class);
    }
}
