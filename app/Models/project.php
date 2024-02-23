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
    // si fa il collegamento con i models della tabella con  cui è collagata 
    // in questo caso si collega alla technologies in modo plurale essendo che è un collegamento many to many
    // e si usa belongstomany con dentro i models a cui è collegata 
    public function technologies()
    {
        return $this->belongsToMany(technology::class);
    }
}
