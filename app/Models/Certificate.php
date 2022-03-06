<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $table = 'certificates';

    protected $guarded = ['created_at', 'updated_at'];
    public function user() 
    {
    	return $this->belongsTo(User::class);
    }
    public function participant() 
    {
    	return $this->belongsTo(participant::class);
    }
}
