<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    use HasFactory;
    // qua si mette la public con il nome della tabella a cui questo model deve fare riferimento 
    // in questo caso il model type si riferisce ai model project con hasmany perchè un tipo  farà riferimento a tanti progetti
    public function projects()
    {

        return $this->hasMany(project::class);
    }
}
