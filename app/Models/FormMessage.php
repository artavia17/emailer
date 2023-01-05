<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormMessage extends Model
{
    use HasFactory;
    public $table = 'form_message';

    public $fillable = [
        'id_form',
        'data',
        'token',
        'id_group'
    ];

}
