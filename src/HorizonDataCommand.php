<?php
/**
 * Created by PhpStorm.
 * User: kevindees
 * Date: 2018-12-19
 * Time: 15:43
 */

namespace QueueRedis;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;


class HorizonDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'horizon:data 
                            {type : The data you wish to target: failed_jobs, recent_jobs, tag }
                            {--C|clear : Clear the data}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Flush horizon data';

    protected $type;
    protected $clear;

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
     * @return mixed
     */
    public function handle()
    {
        $this->type = $this->argument('type');
        $this->clear = $this->option('clear');

        if($this->clear) {
            $this->clear();
        }
    }

    protected function clear() {

        switch ($this->type) {
            case 'failed_jobs' :
                $this->info('Clearing all horizon recent failed and failed jobs');
                Redis::connection()->del('horizon:failed:*');
                Redis::connection()->del('horizon:recent_failed_jobs');
                Redis::connection()->del('horizon:failed_jobs');
                break;
            case 'recent_jobs' :
                $this->info('Clearing all horizon recent jobs');
                Redis::connection()->del('horizon:recent_jobs');
                break;
            default :
                if(!empty($this->type)) {
                    $tag = $this->type;
                    $this->info('Clearing: horizon:' . $tag);
                    Redis::connection()->del('horizon:' . escapeshellarg($tag));
                }
                break;
        }
    }
}