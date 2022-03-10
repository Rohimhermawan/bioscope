<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    use HasFactory;
    protected $table = 'posters';
    protected $guarded = ['created_at', 'updated_at'];
    public function user() 
    {
    	return $this->belongsTo(User::class);
    }
    public function trace() 
    {
    	return $this->hasMany(Trace::class);
    }
}
