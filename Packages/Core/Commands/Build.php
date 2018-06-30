<?php
namespace Packages\Core\Commands;
use Illuminate\Console\Command;

class Build extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'build {package} {assetFile} {--C|custom= : Build to custom directory}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '[Eden] Build frontend module.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $package = strtolower($this->argument('package'));
        $file = $this->argument('assetFile');
        $isCustom = $this->option('custom');
        $command = "npm run build -- --env.pkg={$package} --env.src={$file}";
        if(!empty($isCustom)){
            $command.=" --env.custom=1";
        }
        $this->line('We are building asset file');
        $this->info('FROM: Packages/'. ucfirst($package). '/'. ($isCustom ? 'Custom/' : ''). 'Resources/assets/'. $file);
        $this->info('TO: public/packages/'. $package. '/assets/'. $file);
        passthru($command);
    }
}