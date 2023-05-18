<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Campeonato extends Model
{
    use HasFactory;


    protected $table = 'campeonatos';
/**
 * Get all of the comments for the Campeonato
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function ruedas(): HasMany
{
    return $this->hasMany(Rueda::class,   'competencia_id', 'id');
}

}
