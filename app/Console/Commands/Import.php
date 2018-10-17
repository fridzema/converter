<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;
use App\Jobs\DistributeFiles;

class Import extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'converter:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import files';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    private function collectFiles($files)
    {
      return collect($files);
    }
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $files = $this->collectFiles(Storage::disk(app('ImportDisk'))->files());

      DistributeFiles::dispatch($files);


    }
}
