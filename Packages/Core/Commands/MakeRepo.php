<?php
namespace Packages\Core\Commands;
use Illuminate\Console\Command;
use Packages\Core\Services\CoreServices;

class MakeRepo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repo {package} {repo}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '[Eden] Make new repo.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $package = $this->argument('package');
        $repo = $this->argument('repo');
        $coreServices = app()->make(CoreServices::class);
        $coreServices->exportTemplate($coreServices->packagePath('Core'). '/Publication/Repository', $coreServices->packagePath($package). '/', [ 'package' => $package, 'repo' => $repo ]);
    }
}