<?php

namespace App\Imports;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;

use App\Models\Vehicles_data;

class TrailerImport implements ToCollection, WithChunkReading, ShouldQueue
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
				'transmission' 		  => null,
				'gearbox_detail' 	  => null,
				'fuel' 				  => null,
				'displacement' 		  => null,
				'kw' 				  => null,
				'kw_at_rpm' 		  => null,
				'nm' 				  => null,
				'nm_at_rpm' 		  => null,
				'places' 			  => null,
				'length' 			  => $row[5] ?? '',
				'width' 			  => $row[6] ?? '',
				'height' 			  => $row[7] ?? '',
				'curb_weight' 		  => $row[8] ?? '',
				'total_weight' 		  => $row[9] ?? '',
				'file_type' 		  => 2,
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
