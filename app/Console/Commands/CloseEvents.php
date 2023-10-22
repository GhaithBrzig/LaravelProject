<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;
use Carbon\Carbon;

class CloseEvents extends Command
{
    protected $signature = 'close:events';
    protected $description = 'Close events with a reservation deadline in the past';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Get the current date and time
        $currentDate = Carbon::now();

        // Update events where the reservation deadline is in the past
        Event::where('reservationDeadline', '<', $currentDate)
             ->update(['isClosed' => true]);

        $this->info('Events with past reservation deadlines closed successfully.');
    }
}
