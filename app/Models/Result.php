<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $table = 'results';

    protected $guarded = ['created_at', 'updated_at'];
    public function user() 
    {
    	return $this->belongsTo(User::class);
    }
    public function exam() 
    {
    	return $this->belongsTo(exam::class);
    }
}
