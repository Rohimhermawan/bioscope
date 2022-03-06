<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restrict extends Model
{
    use HasFactory;
    protected $table = 'restricts';

    protected $guarded = ['created_at', 'updated_at'];
    public function user() 
    {
    	return $this->belongsTo(User::class);
    }
}
