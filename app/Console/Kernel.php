<?php

namespace App\Console;

use App\Models\CalonSiswa;
use App\Models\DailyUserCount;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Symfony\Component\Console\Output\ConsoleOutput;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            $output = new ConsoleOutput();
            $belum_lulus = Siswa::where('lulus', 0)->get();
            foreach ($belum_lulus as $b_lulus) {
                Spp::create([
                    'bulan' => now()->month,
                    'tahun' => now()->year,
                    'id_siswa' => $b_lulus->id,
                    'nominal' => '140000',
                ]);
            }
        })->everyMinute();
        $schedule->call(function () {
            $date = Carbon::now()->format('Y-m-d');
            $count = CalonSiswa::whereDate('created_at', $date)->count();

            DailyUserCount::updateOrCreate(
                ['date' => $date],
                ['count' => $count]
            );
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
