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
        $upload = 'storage/app/public/uploads/*';
        $small = 'storage/app/public/uploads/small/*';
        
        exec('rm ' . $upload . ' ' . $small . ' 2>null');

        $this->info('Upload Storage has been cleared.');
    }
}
