<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Batch;
use App\Mail\ReminderEmail;
use App\Jobs\SendReminderEmail;
use App\Models\User;
use App\Models\Reservation;
use Carbon\Carbon;

class SendReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder email to reservation users';

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
        $today = Carbon::today();
        $users = User::all();

        foreach ($users as $user) {
            if(Reservation::where('user_id', $user->id)->exists()) {
                $reservation = Reservation::where('user_id', $user->id)->get();
            }

            if(($reservation->reservation_day) == $today) {
                return Mail::to($user->email)->send(new ReminderEmail($user));
            }
        }
    }
}
