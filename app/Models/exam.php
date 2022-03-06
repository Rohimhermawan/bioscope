<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam extends Model
{
    use HasFactory;
     protected $table = 'exams';
     protected $fillable = ['nama', 'waktu', 'soal', 'peraturan', 'keterangan', 'tanggal'];
    public function question()
    {
        return $this->hasMany(question::class);
    }
    public function answer()
    {
    	return $this->hasMany(Answer::class);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function result()
    {
        return $this->hasMany(Result::class);
    }
}
