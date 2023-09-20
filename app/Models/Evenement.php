<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Evenement extends Model
{

    protected $guarded = [];

    public function user(): BelongsTo {

        return $this->belongsTo(User::class);

    }

    public function metier(): BelongsTo {

        return $this->belongsTo(Metier::class);

    }

    public function taches(): hasMany {

        return $this->hasMany(Tache::class);

    }

    public function recettes() {

        return $this->hasMany(RecetteDepense::class);

    }

}
