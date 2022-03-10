<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trace extends Model
{
    use HasFactory;
    protected $table = 'traces';

    protected $guarded = ['created_at', 'updated_at'];

    public function poster() {
        return $this->belongsTo(Poster::class);
    }
}
