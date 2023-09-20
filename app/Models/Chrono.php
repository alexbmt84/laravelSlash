<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chrono extends Model
{
    use HasFactory;

    public function tache(): BelongsTo {

        return $this->belongsTo(Tache::class);
        
    }
}
