<?php

namespace App\Console\Commands;

use App\Models\Tache;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;


class PomodoroTimer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pomodoro:timer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reminds user to ta a break every 20 minutes.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info("Pomodoro Timer execution !");
        $this->info('pomodoro:timer command is working fine!');

        $userId = auth()->id();

        $taches = Tache::query()->where('user_id', $userId)->get();

        foreach ($taches as $tache) {

            if($tache->etat == 1 && $tache->started_at) {

                $duration = now()->diffInSeconds($tache->started_at);

                $tache->total_time += $duration;
                $tache->paused_at = now();
                $tache->ended_at = null;
                $tache->started_at = null;
                $tache->etat = 0;

                $tache->save();
            }

        }

    }

}
