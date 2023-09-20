<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Metier extends Model
{

    protected $guarded = [];

    public function user(): BelongsTo {

        return $this->belongsTo(User::class);

    }

    public function evenements() {

        return $this->hasMany(Evenement::class);

    }

    public function sphere(): BelongsTo {

        return $this->belongsTo(Sphere::class);

    }
}
