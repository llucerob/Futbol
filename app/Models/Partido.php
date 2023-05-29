<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Partido extends Model
{
    use HasFactory;

    protected $table = 'partidos';


   /**
    * Get the elocal that owns the Partido
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function elocal(): BelongsTo
   {
       return $this->belongsTo(Club::class, 'local', 'id');
   }

    /**
     * Get the local that owns the Partido
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function evisita(): BelongsTo
    {
        return $this->belongsTo(Club::class, 'visita', 'id');
    }


    /**
     * Get the user that owns the Partido
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function encuentro(): BelongsTo
    {
        return $this->belongsTo(Encuentro::class, 'encuentro_id', 'id');
    }
    
    /**
     * The roles that belong to the Partido
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function resultados(): BelongsToMany
    {
        return $this->belongsToMany(Serie::class, 'seriespartidos', 'partido_id', 'serie_id')
                                    ->as('resultados')
                                    ->withPivot('nombreserie', 'goleslocal', 'golesvisita', 'id')
                                    ->withTimestamps();
    }


    
    
}
