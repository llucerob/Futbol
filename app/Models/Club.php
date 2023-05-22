<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Club extends Model
{
    use HasFactory;
    protected $table= 'clubes';

    /**
     * The roles that belong to the Club
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function series(): BelongsToMany
    {
        return $this->belongsToMany(Serie::class, 'seriesclub', 'club_id', 'serie_id')->withTimestamps();;
    }
    

    /**
     * Get the estadio associated with the Club
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estadio(): HasOne
    {
        return $this->hasOne(Estadio::class, 'club_id', 'id');
    }
}
