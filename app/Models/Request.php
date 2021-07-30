<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'e_mail', 
        'company_name', 
        'products', 
        'link', 
        'body', 
    ];


}
