<?php

use App\Laravel\Models\Services;
use Illuminate\Database\Seeder;

class DefaultServices extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Services::truncate();
        Services::create(['name' => 'Pre-construction Permit']);
        Services::create(['name' => 'Post-construction Permit']);
        Services::create(['name' => 'Renewal of Permit']);
        Services::create(['name' => 'CEI']);
        Services::create(['name' => 'LOA']);
        
    }
}
