<?php

namespace App\Console\Commands;

use App\Models\SubscriptionPlan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeactivateExpiredSubscriptions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:deactivate-expired-subscriptions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deactivate users whose subscription has expired';

    /**
     * Execute the console command.
     */
    public function __construct()
    {
        parent::__construct();
    }
 
    public function handle()
    {
        $expiredPlans = SubscriptionPlan::where('end_date', '<', Carbon::now())->get();

        foreach ($expiredPlans as $plan) {
            $user = User::find($plan->user_id);
            if ($user && $user->is_active) {
                $user->is_active = 0;
                $user->save();
            }
        }

        $this->info('Expired users have been deactivated successfully.');
        return 0;
    }
}
