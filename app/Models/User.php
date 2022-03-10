<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'pembayaran'
    ];

    public function participant()
    {
        return $this->hasOne(Participant::class);
    }
    public function restrict()
    {
        return $this->hasOne(Restrict::class);
    }
    public function answer()
    {
        return $this->hasMany(Answer::class);
    }
    public function exam()
    {
        return $this->hasMany(exam::class);
    }
    public function result()
    {
        return $this->hasMany(Result::class);
    }
    public function quiziz()
    {
        return $this->hasMany(Quiziz::class);
    }
    public function quiziz1()
    {
        return $this->hasMany(Quiziz1::class);
    }
    public function poster()
    {
        return $this->hasMany(Poster::class);
    }
    public function scopeFilter($query, array $filters) 
    {
        $query->when($filters['bayar']??false, function($query, $bayar) {
            return $query->where([
                            ['is_admin', '=', $bayar],
                            ['pembayaran', '=', 'Sudah Bayar']])
                    ->orWhere([
                        ['is_admin', '=', $bayar],
                        ['pembayaran', '=', 'Lolos']]);
        });
    }
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
