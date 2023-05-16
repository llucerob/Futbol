<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fecha extends Model
{
    use HasFactory;

    protected $table = 'fechas';

    /**
     * Get the user that owns the Fecha
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rueda(): BelongsTo
    {
        return $this->belongsTo(Rueda::class, 'id', 'rueda_id');
    }

    /**
     * Get all of the comments for the Fecha
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function encuentros(): HasMany
    {
        return $this->hasMany(Encuentro::class, 'fecha_id', 'id');
    }
}
