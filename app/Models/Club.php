<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
    
}
