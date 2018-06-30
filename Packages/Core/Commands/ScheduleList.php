<?php
namespace Packages\Core\Commands;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;

class ScheduleList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:list';
    /**
     * @var Schedule
     */
    protected $schedule;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '[Eden] List all schedules.';

    /**
     * ScheduleList constructor.
     *
     * @param Schedule $schedule
     */
    public function __construct(Schedule $schedule)
    {
        parent::__construct();

        $this->schedule = $schedule;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $events = array_map(function ($event) {
            return [
                'cron' => $event->expression,
                'command' => static::fixupCommand($event->command),
            ];
        }, $this->schedule->events());

        $this->table(
            ['Cron', 'Command'],
            $events
        );
    }

    /**
     * If it's an artisan command, strip off the PHP
     *
     * @param $command
     * @return string
     */
    protected static function fixupCommand($command)
    {
        $parts = explode(' ', $command);
        if (count($parts) > 2 && $parts[1] === "'artisan'") {
            array_shift($parts);
        }

        return implode(' ', $parts);
    }
}