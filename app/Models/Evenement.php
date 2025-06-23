<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'date',
        'lieu',
        'organisateur_id',
    ];

    // 🔗 Relation vers l’organisateur
    public function organisateur()
    {
        return $this->belongsTo(User::class, 'organisateur_id');
    }
}
