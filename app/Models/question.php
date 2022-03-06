<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;
    protected $table = 'questions';
	protected $guarded = ['id', 'created_at', 'updated_at'];

    public function exam() 
    {
    	return $this->belongsTo(exam::class);
    }

    public function answer()
    {
    	return $this->hasMany(Answer::class);
    }
}
