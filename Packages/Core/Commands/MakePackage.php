<?php
namespace Packages\Core\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Packages\Core\Services\CoreServices;

class MakePackage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:pkg {package}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '[Eden] Make new package';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $package = $this->argument('package');
        $coreServices = app()->make(CoreServices::class);
        $coreServices->exportTemplate($coreServices->packagePath('Core'). '/Publication/Package', $coreServices->packagePath(ucwords($package)), [ 'package' => ($package)]);
        Cache::flush();
    }
}