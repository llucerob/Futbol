<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Encuentro extends Model
{
    use HasFactory;
    protected $table = 'encuentros';

    /**
     * Get the fechas  that owns the Encuentro
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fecha(): BelongsTo
    {
        return $this->belongsTo(Fecha::class, 'fecha_id', 'id');
    }

    /**
     * Get all of the comments for the Encuentro
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function partido(): HasOne
    {
        return $this->hasOne(Partido::class, 'encuentro_id', 'id');
    }

   /**
    * Get the user that owns the Encuentro
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function estadio(): BelongsTo
   {
       return $this->belongsTo(Estadio::class, 'estadio_id', 'id');
   }
}
