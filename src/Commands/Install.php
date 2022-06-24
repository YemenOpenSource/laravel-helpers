<?php

namespace YemeniOpenSource\LaravelHelpers;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'helpers:link';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create helpers.php file with simple example.';

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
        // TODO: make config file for helpers.php path
        $helpersFilePath = resource_path('helpers.php');

        if (File::exists($helpersFilePath)) {
            $this->info('Looks like you have a helpers.php file exists at resource/helpers.php');
            return;
        }

        File::put($helpersFilePath, $this->helpersFileContents());
        $this->info('Yalla! Start writing you helper functions at resource/helpers.php');
    }

    protected function helpersFileContents()
    {
        return <<<EOT
<?php
/**
 *  Put your helpers function here.
 */
use Illuminate\Support\Carbon;
if (! function_exists('carbon')) {
    function carbon(\$parseString = null, \$tz = null)
    {
        return new Carbon(\$parseString, \$tz);
    }
}
EOT;
    }
}
