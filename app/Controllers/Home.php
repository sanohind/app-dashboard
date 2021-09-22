<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('main2');
	}

	public function inv()
	{
		return view('invoice-print');
	}
}
