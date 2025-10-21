<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Database\Seeders\DemoSeeder;

class SeedDemoData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed demo data for the demo panel';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Seeding demo data...');
        
        $seeder = new DemoSeeder();
        $seeder->run();
        
        $this->info('Demo data seeded successfully!');
        $this->line('');
        $this->line('Demo users created:');
        $this->line('- admin@demo.com (password: password)');
        $this->line('- joao@demo.com (password: password)');
        $this->line('- maria@demo.com (password: password)');
        $this->line('- pedro@demo.com (password: password)');
        $this->line('- ana@demo.com (password: password)');
        $this->line('');
        $this->line('Demo clients created:');
        $this->line('- contato@techcorp.com');
        $this->line('- admin@startupxyz.com');
        $this->line('- contato@empresaabc.com');
        $this->line('- info@digitalsolutions.com');
        $this->line('');
        $this->line('Demo leads and products also created!');
    }
}
