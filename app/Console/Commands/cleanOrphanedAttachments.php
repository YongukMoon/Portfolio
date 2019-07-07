<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class cleanOrphanedAttachments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'my:coa';

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
     * @return mixed
     */
    public function handle()
    {
        $orphaned=\App\Attachment::whereNull('article_id')
        ->where('created_at', '<', \Carbon\Carbon::now()->subWeek())
        ->get();

        foreach($orphaned as $attachment){
            $path=attachments_path($attachment->filename);
            
            if(\File::exists($path)){
                \File::delete($path);
            }
            $attachment->delete();
            $this->line($path.' deleted');
        }

        $this->info('Delete Success');
        return;
    }
}
