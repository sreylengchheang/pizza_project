<?php namespace App\Controllers;

class Author extends BaseController
{
	public function index()
	{
		return view('auths/login');
	}
	public function register()
	{
		return view('auths/register');
	}

	

}