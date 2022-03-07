<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class participant extends Model
{
    use HasFactory;
    protected $table = 'participants';

    protected $guarded = ['created_at', 'updated_at'];
    public function user() 
    {
    	return $this->belongTo(User::class);
    }
}
