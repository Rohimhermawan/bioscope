<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'users';

    public function participant()
    {
        return $this->hasMany(participant::class);
    }
    public function restrict()
    {
        return $this->hasMany(Restrict::class);
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
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'pembayaran'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
