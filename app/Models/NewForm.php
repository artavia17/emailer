<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewForm extends Model
{
    use HasFactory;

    public $table = 'form';

    public $fillable = [
        'id_group',
        'name',
        'data',
        'token'
    ];


}
