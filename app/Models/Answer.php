<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = ['exam_id', 'user_id', 'jawaban', 'hasil'];

    protected $table = 'answers';
    public function question()
    {
    	return $this->belongsTo(question::class);
    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function exam()
    {
        return $this->belongsTo(exam::class);
    }
}
