<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class technology extends Model
{
    use HasFactory;
     // si fa il collegamento con i models della tabella con  cui è collagata 
    // in questo caso si collega alla projects in modo plurale essendo che è un collegamento many to many
    // e si usa belongstomany con dentro i models a cui è collegata 
    public function projects()
    {
        return $this->belongsToMany(project::class);
    }
}
