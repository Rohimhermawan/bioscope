<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Controller extends Model
{
    use HasFactory;
    protected $table = 'controllers';
    protected $guarded = ['created_at', 'updated_at'];
}
