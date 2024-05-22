<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{	
	public function index()
	{
		$result['data'] = [];
        return view('home', $result);
	}
	public function tour_details($id)
	{
		$result['data'] = [];
        return view('tour-details', $result);
	}
}
