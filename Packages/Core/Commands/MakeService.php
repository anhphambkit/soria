<?php
namespace Packages\Core\Commands;
use Illuminate\Console\Command;
use Packages\Core\Services\CoreServices;

class MakeService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {package} {service}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '[Eden] Make new service.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $package = $this->argument('package');
        $service = $this->argument('service');
        $coreServices = app()->make(CoreServices::class);
        $coreServices->exportTemplate($coreServices->packagePath('Core'). '/Publication/Services', $coreServices->packagePath($package). '/', [ 'package' => $package, 'service' => $service ]);
    }
}