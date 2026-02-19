<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'client';

    protected $fillable = [
        'Name',
        'Code',
        'Type',
        'EmailRecepients',
        'DropOff',
        'Country',
        'Price',
        'Currency',
        'password',
        'active',
    ];

    protected $hidden = ['password', 'remember_token'];
}
