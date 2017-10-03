<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\AdminsController;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create
                            {admin : login}
                            {password : password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Admin create';

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
        $adminLogin = $this->argument('admin');
        $adminPassword = $this->argument('password');

        $AdminsController = new AdminsController();
        $newAdmin = $AdminsController->adminsCreate($adminLogin, $adminPassword);

        if ($newAdmin != false) {
            $this->info(sprintf('User "%s" was successfully created', $newAdmin['login']));
        } else {
            $this->error('This user already exists');
        }
    }
}
