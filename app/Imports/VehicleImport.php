<?php

namespace App\Imports;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;

use App\Models\Vehicles_data;

class VehicleImport implements ToCollection, WithChunkReading, ShouldQueue
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Vehicles_data::create([
                'certificate_number'  => $row[0] ?? '',
				'category' 			  => $row[1] ?? '',
				'subcategory' 		  => $row[2] ?? '',
				'manufacturer' 		  => $row[3] ?? '',
				'series' 			  => $row[4] ?? '',
				'subseries' 		  => $row[5] ?? '',
				'model' 			  => $row[6] ?? '',
				'drive' 			  => $row[7] ?? '',
				'transmission' 		  => $row[8] ?? '',
				'gearbox_detail' 	  => $row[9] ?? '',
				'fuel' 				  => $row[10] ?? '',
				'displacement' 		  => $row[11] ?? '',
				'kw' 				  => $row[12] ?? '',
				'kw_at_rpm' 		  => $row[13] ?? '',
				'nm' 				  => $row[14],
				'nm_at_rpm' 		  => $row[15] ?? '',
				'places' 			  => $row[16] ?? '',
				'length' 			  => $row[17] ?? '',
				'width' 			  => $row[18] ?? '',
				'height' 			  => $row[19] ?? '',
				'curb_weight' 		  => $row[20] ?? '',
				'total_weight' 		  => $row[21] ?? '',
				'file_type' 		  => 0,
				'created_at'		  => date('Y-m-d H:i:s'),		
				'updated_at'		  => date('Y-m-d H:i:s')
            ]);
        }
    }
	public function chunkSize(): int
    {
        return 5000;
    }
}
