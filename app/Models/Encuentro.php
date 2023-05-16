<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Encuentro extends Model
{
    use HasFactory;
    protected $table = 'encuentros';

    /**
     * Get the fechas  that owns the Encuentro
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fechas(): BelongsTo
    {
        return $this->belongsTo(Fecha::class, 'id', 'fecha_id');
    }

  /**
   * The roles that belong to the Encuentro
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function partidos(): BelongsToMany
  {
      return $this->belongsToMany(Role::class, 'encuentrospartidos', 'encuentro_id', 'partido_id');
  }
}
