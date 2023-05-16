<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Serie extends Model
{
    use HasFactory;

    protected $table = 'series';


    /**
     * The roles that belong to the Serie
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function clubs(): BelongsToMany
    {
        return $this->belongsToMany(Club::class, 'seriesclub', 'club_id', 'serie_id')->withTimestamps();;
    }

    
    
}
