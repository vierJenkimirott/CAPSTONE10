<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TestViolationsSeeder extends Seeder
{
    public function run()
    {
        // Clear any existing violations
        DB::table('violations')->truncate();
        
        // No violations will be created - they will be added manually through the UI
    }
}
