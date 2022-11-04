<?php

namespace App\Console\Commands;

use App\Jobs\ExportDatabase;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class PlaygroundCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laravel:playground';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
//        dd(get_object_vars(DB::table('parts')->limit(5)->get()->toArray()[0]));

        $job = new ExportDatabase([
            'parts' => __DIR__ . '/parts.csv',
        ]);
        $job->handle();

        return 0;
    }
}
