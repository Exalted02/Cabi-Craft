<?php

namespace App\Imports;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;

use App\Models\Vehicles_data;

class MotorcycleImport implements ToCollection, WithChunkReading, ShouldQueue
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
				'series' 			  => null,
				'subseries' 		  => null,
				'model' 			  => $row[4] ?? '',
				'drive' 			  => null,
				'transmission' 		  => $row[5] ?? '',
				'gearbox_detail' 	  => $row[6] ?? '',
				'fuel' 				  => $row[7] ?? '',
				'displacement' 		  => $row[8] ?? '',
				'kw' 				  => $row[9] ?? '',
				'kw_at_rpm' 		  => null,
				'nm' 				  => null,
				'nm_at_rpm' 		  => null,
				'places' 			  => null,
				'length' 			  => $row[10] ?? '',
				'width' 			  => $row[11] ?? '',
				'height' 			  => $row[12] ?? '',
				'curb_weight' 		  => $row[13] ?? '',
				'file_type' 		  => 1,
				'total_weight' 		  => null,
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
