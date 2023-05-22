<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resultado extends Model
{
    use HasFactory;

     protected $table = 'tablapuntos';



     /**
      * Get the user that owns the Resultado
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function serie(): BelongsTo
     {
         return $this->belongsTo(Serie::class, 'serie_id', 'id');
     }
     public function club(): BelongsTo
     {
         return $this->belongsTo(Club::class, 'club_id', 'id');
     }
}
