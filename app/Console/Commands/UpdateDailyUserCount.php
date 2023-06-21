<?php

namespace App\Console\Commands;

use App\Models\DailyUserCount;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateDailyUserCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-daily-user-count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $date = Carbon::now()->format('Y-m-d');
        $count = User::whereDate('created_at', $date)->count();

        DailyUserCount::updateOrCreate(
            ['date' => $date],
            ['count' => $count]
        );

        $this->info('Daily user count updated successfully.');
    }
}
