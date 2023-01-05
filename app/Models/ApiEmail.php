<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiEmail extends Model
{
    use HasFactory;

    public $table = 'data_api_email';

    protected $fillable = [
        'id_user',
        'transport',
        'host',
        'port',
        'encryption',
        'username',
        'password',
        'token',
        'email'
      
    ];

}
