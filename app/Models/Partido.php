<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Partido extends Model
{
    use HasFactory;

    protected $table = 'partidos';


    /**
     * Get the local that owns the Partido
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function local(): BelongsTo
    {
        return $this->belongsTo(Club::class, 'id', 'local');
    }

    /**
     * Get the local that owns the Partido
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function visita(): BelongsTo
    {
        return $this->belongsTo(Club::class, 'id', 'visita');
    }
      /**
   * The roles that belong to the Encuentro
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function encuentros(): BelongsToMany
  {
      return $this->belongsToMany(Role::class, 'encuentrospartidos', 'encuentro_id', 'partido_id');
  }
    
}
