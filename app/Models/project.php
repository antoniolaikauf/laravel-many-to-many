<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
    // qua si mette la public con il nome della tabella a cui questo model deve fare riferimento 
    // in questo caso il model project si riferisce ai model type con belongto perchè un progetto farà riferimento ad un solo tipo
    public function type()
    {

        return $this->belongsTo(type::class);
    }
}
