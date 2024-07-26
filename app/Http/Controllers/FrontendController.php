<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{	
	public function index()
	{
		return view('home');
	}
	public function browse()
	{
        return view('browsecatalogue');
	}
	public function login()
	{
        return view('login');
	}
	public function register()
	{
        return view('register');
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
}
