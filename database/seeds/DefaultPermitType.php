<?php

use App\Laravel\Models\PermitType;
use Illuminate\Database\Seeder;

class DefaultPermitType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PermitType::truncate();
        PermitType::create(['service_id' => '1' , 'name' => "Architectural Permit", 'type'=> "architectural_permit" ]);
        PermitType::create(['service_id' => '1' , 'name' => "Building Permit", 'type'=> "building_permit"]);
        PermitType::create(['service_id' => '1' , 'name' => "Civil/Structural Permit", 'type'=> "civil_permit"]);
        PermitType::create(['service_id' => '1' , 'name' => "Electrical Permit", 'type'=> "electrical_permit" ]);
        PermitType::create(['service_id' => '1' , 'name' => "Electronics Permit", 'type'=> "electronics_permit" ]);
        PermitType::create(['service_id' => '1' , 'name' => "Excavation & Groun Preparation Permit", 'type'=> "excavation_permit" ]);
        PermitType::create(['service_id' => '1' , 'name' => "Fencing Permit", 'type'=> "fencing_permit" ]);
        PermitType::create(['service_id' => '1' , 'name' => "Mechanical Permit", 'type'=> "mechanical_permit" ]);
        PermitType::create(['service_id' => '1' , 'name' => "Plumbing Permit", 'type'=> "plumbing_permit" ]);
        PermitType::create(['service_id' => '1' , 'name' => "Sanitary Permit", 'type'=> "sanitary_permit"]);

        PermitType::create(['service_id' => '2' , 'name' => "Occupancy Permit"]);
        PermitType::create(['service_id' => '2' , 'name' => "Electrical Permit to Operate"]);
        PermitType::create(['service_id' => '2' , 'name' => "Mechanical Permit to Operate"]);
        PermitType::create(['service_id' => '2' , 'name' => "Electronics Permit to Operate"]);

        PermitType::create(['service_id' => '3' , 'name' => "Annual Inspection"]);
        PermitType::create(['service_id' => '3' , 'name' => "Electrical Permit to Operate"]);
        PermitType::create(['service_id' => '3' , 'name' => "Mechanical Permit to Operate"]);
        PermitType::create(['service_id' => '3' , 'name' => "Electronics Permit to Operate"]);

    }
}
