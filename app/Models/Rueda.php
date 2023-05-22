<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Rueda extends Model
{
    use HasFactory;
    protected $table = 'ruedas';

    /**
     * Get the campeonato that owns the Rueda
     *
     * @return \Illuminate\Campeonatobase\Eloquidns\BelongsTo
     */
    public function campeonato(): BelongsTo
    {
        return $this->belongsTo(Campeonato::class, 'competencia_id', 'id');
    }

    /**
     * Get all of the comments for the Rueda
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fechas(): HasMany
    {
        return $this->hasMany(Fecha::class, 'rueda_id', 'id');
    }
}
