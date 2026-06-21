<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'clients';

    protected $fillable = [
        'name',
        'code',
        'categoryId',
        'group',
        'emailRecepients',
        'currency',
        'password',
        'active',
        'personnel',
        'dateCreated',
    ];

    protected $hidden = ['password', 'remember_token'];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
