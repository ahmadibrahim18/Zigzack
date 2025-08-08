<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use app\models\category;
use app\models\favorite;
use app\models\history;
use app\models\playlist;
use app\models\user;
use app\models\video;
use app\models\playlist_video;
class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
}
