<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class expiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'for user expire every day';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $todayDate = Carbon::now();

        $users =User::where('is_admin',0)->where('expired_date','<',$todayDate)->where('expired',1)->get();
        foreach($users as $user){
            $user->update(['expired'=>0]);
        }
        return Command::SUCCESS;
    }
}
