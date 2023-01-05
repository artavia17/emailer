<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    use HasFactory;

    public $table = 'notify';

    public $fillable = [
        'id_user',
        'id_group',
        'title',
        'text',
        'type',
        'view',
    ];

}
