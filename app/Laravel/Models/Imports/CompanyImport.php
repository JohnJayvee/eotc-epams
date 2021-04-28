<?php 

namespace App\Laravel\Models\Imports;

use App\Laravel\Models\Company;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;

use Str, Helper, Carbon;

class CompanyImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // dd($rows);

        foreach ($rows as $index => $row) 
        {
            if($index == 0) {
                continue;
            }

            $is_exist = Company::where('comp_code',$row[1])->first();

            if (!$is_exist) {
                 $company = Company::create([
                'entity_code' => $row[0],
                'comp_code' => $row[1],
                'urn' => $row[2],
                'company_name' => $row[3],
                'type' => $row[4],
                'type_code' => $row[5],
                'zone_code' => $row[6],
                'zone_location' => $row[7],
                'cr_no' => $row[8],
                'industry' => $row[9],
                'city' => $row[10],
                'province' => $row[11],
                'region' => $row[12],
                'region_code' => $row[13],
                'obo_cluster' => $row[14],
                'income_cluster' => $row[15],
                'status' => "APPROVED",
                ]);
               
                $company->save();
            }
           
           
        }
    }
}