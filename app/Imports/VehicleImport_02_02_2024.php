<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Models\Vehicles_data;
use App\Models\Cms_pages;

class VehicleImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
	public function collection(Collection $rows)
	{
		//dd($rows);
		//echo $rows[0]['typenscheinnummer'];
		//echo "<pre>";print_r($rows);die;
		$data = $rows->toArray();
		//echo "<pre>";print_r($data);die;
		Vehicles_data::insert($data);
		
		/*$chunkSize = 10000; // Set the desired chunk size

		$chunks = $rows->chunk($chunkSize); // Split the collection into chunks
		//dd($rows->toArray());
		//echo "<pre>";print_r($chunks);die;
		foreach($chunks as $chunk) {
			foreach ($chunk as $row) {
				//echo 'hello-' . $row['typenscheinnummer'] ;die;
			Vehicles_data::create([
				'certificate_number'  => $row['typenscheinnummer'] ?? '',
				'category' 			  => $row['kategorie'] ?? '',
				'subcategory' 		  => $row['subkategorie'] ?? '',
				'manufacturer' 		  => $row['hersteller'] ?? '',
				'series' 			  => $row['serie'] ?? '',
				'subseries' 		  => $row['subserie'] ?? '',
				'model' 			  => $row['model'] ?? '',
				'drive' 			  => $row['antrieb'] ?? '',
				'transmission' 		  => $row['getriebe'] ?? '',
				'gearbox_detail' 	  => $row['getriebedetail'] ?? '',
				'fuel' 				  => $row['treibstoff'] ?? '',
				'displacement' 		  => $row['hubraum'] ?? '',
				'kw' 				  => $row['kw'] ?? '',
				'kw_at_rpm' 		  => $row['kwbeiumin'] ?? '',
				'nm' 				  => $row['nm'] ?? '',
				'nm_at_rpm' 		  => $row['nmbeiumin'] ?? '',
				'places' 			  => $row['platze'] ?? '',
				'length' 			  => $row['lange'] ??'',
				'width' 			  => $row['breite'] ?? '',
				'height' 			  => $row['hohe'] ??'',
				'curb_weight' 		  => $row['leergewicht'] ?? '',
				'total_weight' 		  => $row['gesamtgewicht'] ?? '',
				'created_at'		  => date('Y-m-d H:i:s'),		
				'updated_at'		  => date('Y-m-d H:i:s')
				]);
				
			  }
			}*/
		

		
		/*foreach($rows as $row) {
			$cmsPageName = $row[0] ?? 'Default Name';
			Cms_pages::create([
				'cms_page_name'     => $cmsPageName,
				'slug'              => $row[1] ?? 'default-slug',
				'cms_page_content'  => $row[2] ?? 'Default content',
				'status'            => $row[3] ?? 1,
                'created_at'		=> date('Y-m-d h:i:s'),		
                'updated_at'		=> date('Y-m-d h:i:s'),			
			]);
		}*/

		/*foreach($rows as $row)
		{
			Cms_pages::create([
				'cms_page_name' 		=> $row[0],
				'slug' 					=> $row[1],
				'cms_page_content' 		=> $row[2],
				'status' 				=> $row[3],
			]);
	    }*/
		
        /*foreach($rows as $row)
		{
			
			Vehicles_data::create([
			'certificate_number' 		=> $row[0],
            'category' 					=> $row[1],
            'subcategory' 				=> $row[2],
            'manufacturer' 				=> $row[3],
            'series' 					=> $row[4],
            'subseries' 				=> $row[5],
            'model' 					=> $row[6],
            'drive' 					=> $row[7],
            'transmission' 				=> $row[8],
            'gearbox_detail' 			=> $row[9],
            'fuel' 						=> $row[10],
            'displacement' 				=> $row[11],
            'kw' 						=> $row[12],
            'kw_at_rpm' 				=> $row[13],
            'nm' 						=> $row[14],
            'nm_at_rpm' 				=> $row[15],
            'places' 					=> $row[16],
            'length' 					=> $row[17],
            'width' 					=> $row[18],
            'height' 					=> $row[19],
            'curb_weight' 				=> $row[20],
            'total_weight' 				=> $row[22],
			'created_at'		=> date('Y-m-d h:i:s'),		
            'updated_at'		=> date('Y-m-d h:i:s'),		
			]);
			
		}*/
	//------ 02-02-2023--------	
	/*$cnt = count($rows);
	foreach($rows as $key=>$row)
	{
		if($key < 34999)
		{
			Vehicles_data::create([
			'certificate_number'  => $row['typenscheinnummer'] ?? '',
			'category' 			  => $row['kategorie'] ?? '',
			'subcategory' 		  => $row['subkategorie'] ?? '',
			'manufacturer' 		  => $row['hersteller'] ?? '',
			'series' 			  => $row['serie'] ?? '',
			'subseries' 		  => $row['subserie'] ?? '',
			'model' 			  => $row['model'] ?? '',
			'drive' 			  => $row['antrieb'] ?? '',
			'transmission' 		  => $row['getriebe'] ?? '',
			'gearbox_detail' 	  => $row['getriebedetail'] ?? '',
			'fuel' 				  => $row['treibstoff'] ?? '',
			'displacement' 		  => $row['hubraum'] ?? '',
			'kw' 				  => $row['kw'] ?? '',
			'kw_at_rpm' 		  => $row['kwbeiumin'] ?? '',
			'nm' 				  => $row['nm'] ?? '',
			'nm_at_rpm' 		  => $row['nmbeiumin'] ?? '',
			'places' 			  => $row['platze'] ?? '',
			'length' 			  => $row['lange'] ??'',
			'width' 			  => $row['breite'] ?? '',
			'height' 			  => $row['hohe'] ??'',
			'curb_weight' 		  => $row['leergewicht'] ?? '',
			'total_weight' 		  => $row['gesamtgewicht'] ?? '',
			'created_at'		  => date('Y-m-d H:i:s'),		
			'updated_at'		  => date('Y-m-d H:i:s')		
			]);
		}
		
	}*/
	//echo "<pre>";print_r($result);die;
  }
}
