<?php

namespace App\Imports;

use App\Models\Vehicles_data;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMapping;

class VehicleImport implements ToModel, WithMapping
{
    public function model(array $row)
    {
		
        return new Vehicles_data([
            'certificate_number' 		=> $row['Typenscheinnummer'],
            'category' 					=> $row['Kategorie'],
            'subcategory' 				=> $row['Subkategorie'],
            'manufacturer' 				=> $row['Hersteller'],
            'series' 					=> $row['Serie'],
            'subseries' 				=> $row['Subserie'],
            'model' 					=> $row['Model'],
            'drive' 					=> $row['Antrieb'],
            'transmission' 				=> $row['Getriebe'],
            'gearbox_detail' 			=> $row['Getriebe Detail'],
            'fuel' 						=> $row['Treibstoff'],
            'displacement' 				=> $row['Hubraum'],
            'kw' 						=> $row['kW'],
            'kw_at_rpm' 				=> $row['kW bei U/min'],
            'nm' 						=> $row['nm'],
            'nm_at_rpm' 				=> $row['Nm bei U/min'],
            'places' 					=> $row['Plätze'],
            'length' 					=> $row['Länge'],
            'width' 					=> $row['Breite'],
            'height' 					=> $row['Höhe'],
            'curb_weight' 				=> $row['Leergewicht'],
            'total_weight' 				=> $row['Gesamtgewicht'],
         ]);
    }
	public function map($row): array
	{
		Log::info($row);
		return [
			'Typenscheinnummer' 	=> $row[0],
			'Kategorie' 			=> $row[1],
			'Subkategorie' 			=> $row[2],
			'Hersteller' 			=> $row[3],
			'Serie' 				=> $row[4],
			'Subserie' 				=> $row[5],
			'Model' 				=> $row[6],
			'Antrieb' 				=> $row[7],
			'Getriebe' 				=> $row[8],
			'Getriebe Detail' 		=> $row[9],
			'Treibstoff' 			=> $row[10],
			'Hubraum' 				=> $row[11],
			'kW' 					=> $row[12],
			'kW bei U/min' 			=> $row[13],
			'nm' 					=> $row[14],
			'Nm bei U/min' 			=> $row[15],
			'Plätze' 				=> $row[16],
			'Länge' 				=> $row[17],
			'Breite' 				=> $row[18],
			'Höhe' 					=> $row[19],
			'Leergewicht' 			=> $row[20],
			'Gesamtgewicht' 		=> $row[21],
		];
	}


    /*public function map(array $row): array
    {
        return [
            'Typenscheinnummer' => $row[0],
            'Kategorie' => $row[1],
            // Add more mappings as needed
        ];
    }*/
}
