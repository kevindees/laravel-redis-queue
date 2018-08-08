
<?php
namespace QueueRedis;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class QueueRedisCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'queue:redis 
                            {queue? : The queue you wish to target} 
                            {--C|clear : Clear the queue}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Flush redis queue';

    protected $queue;
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
        $this->queue = $this->argument('queue') ?: config('queue.connections.redis.queue');
        $this->clear = $this->option('clear');

        if($this->clear) {
            $this->clear();
        }
    }

    protected function clear() {
        $del = 'queues:' . escapeshellcmd($this->queue);
        $this->info('Clearing Redis ' . $del);
        Redis::connection()->del($del);
    }
}
