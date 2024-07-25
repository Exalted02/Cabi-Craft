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
}
