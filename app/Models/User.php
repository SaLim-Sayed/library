<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    // protected $casts = ['is_admin' => 'boolean'];
    protected $fillable = [
        'name',
        'email',
        'password',
        // 'is_admin',
    ];

    protected $hidden = [
        'password',
    ];

    public function notes(){
        return $this->hasMany(Note::class);
    }

}
