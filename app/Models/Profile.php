<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    
    protected $fillable = [
        'clientCode',
        'playFrequency', // 1–2 rounds per month, Weekly, 2–3 times per week, Tournament / heavy player
        'club',
        'courses',
        'dropOff',  // Home, Office, Clubhouse
        'preferredShower', // Scent type, Sensitive skin, Travel kit needs
        'kitSize', //Personal, Family, Locker kit
        'personnel',
        'dateCreated',
    ];
    
     public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
