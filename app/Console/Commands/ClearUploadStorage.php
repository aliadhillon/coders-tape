<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearUploadStorage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upload:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will delete all the photos from public upload folder';

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
        $upload = 'app/public/uploads/*';
        $small = 'app/public/small/uploads/*';
        exec('rm -rf ' . storage_path($upload) . ' ' . storage_path($small));

        $this->info('Upload Storage has been cleared.');
    }
}
