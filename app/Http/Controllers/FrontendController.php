<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class FrontendController extends Controller
{	
	public function index()
	{
		//dd(Category::get());
		return view('home');
	}
	public function browse()
	{
        return view('browsecatalogue');
	}
	public function cart()
	{
        return view('cart');
	}
	public function profile()
	{
        return view('profile');
	}
	public function setting()
	{
        return view('setting');
	}
	public function offer()
	{
        return view('offer');
	}
	public function orderhistory()
	{
        return view('orderhistory');
	}
	public function offerdetail()
	{
        return view('offerdetails');
	}
	public function neworder()
	{
		return view('neworder');
	}
}
