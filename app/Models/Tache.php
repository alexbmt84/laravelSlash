<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tache extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo {

        return $this->belongsTo(User::class);

    }

    public function evenement(): BelongsTo {

        return $this->belongsTo(Evenement::class);

    }

    public function getFormattedTime() {

        return $this->secondsToTime($this->total_time);
    }

    private function secondsToTime($seconds) {

        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds / 60) % 60);
        $seconds = $seconds % 60;

        return sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

    }

    public function timeCalendar() {

        $date = CarbonImmutable::parse($this->created_at);

        return $date->locale('fr')->calendar();

    }

}
