<?php

namespace App\Console\Commands;

use App\Mail\OrderNotifyCustomer;
use App\Packages\SystemGeneral\Constants\SettingConfig;
use App\Packages\SystemGeneral\Services\GeneralSettingServices;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Cache;

class Maintenance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maintenance:run {status}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display an inspiring quote';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $shopSettings = app()->make(GeneralSettingServices::class)->getAllSettingsForRenderByTypeWeb(SettingConfig::SHOP);
        \Illuminate\Support\Facades\Mail::to('phamtuananh.bkit@gmail.com')->send(new OrderNotifyCustomer($shopSettings));

        $status = filter_var($this->argument('status'),FILTER_VALIDATE_BOOLEAN);
        if($status)
            Cache::forever('maintenance', true);
        else
            Cache::forget('maintenance');
    }
}
