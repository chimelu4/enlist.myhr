<?php

namespace App\Console\Commands;

use App\Models\admin;
use Illuminate\Console\Command;

class dailySalary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'salary:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This generates and inserts daily salary table';

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
       
        $admin = new admin();
        $admin->name = "test";
        $admin->save();
         return "success on daily salary insert";
    }
}
