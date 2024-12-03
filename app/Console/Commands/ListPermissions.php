<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;

class ListPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all permissions with their IDs';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $permissions = Permission::all();

        if ($permissions->isEmpty()) {
            $this->info('No permissions found.');
            return 0;
        }

        $this->table(
            ['ID', 'Name'], 
            $permissions->map(fn($permission) => [$permission->id, $permission->name])
        );

        return 0;
    }
}