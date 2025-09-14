<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class D1Refresh extends Command
{
    // php artisan d1:refresh
    protected $signature = 'd1:refresh';
    protected $description = 'Refresh all tables in D1 (like Postgres TRUNCATE)';

    public function handle()
    {
        $tables = ['users'];

        foreach ($tables as $table) {
            DB::connection('d1')->statement("DELETE FROM {$table}");
            DB::connection('d1')->statement("UPDATE sqlite_sequence SET seq = 0 WHERE name='{$table}'");
            $this->info("Refreshed table: {$table}");
        }

        $this->info("D1 database refresh complete!");
    }
}
