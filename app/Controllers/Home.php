<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$getData = file_get_contents("http://10.1.10.101/api-display/public/stockbypart/?group=FG");
		$top10 = array_slice(json_decode($getData)->data,0,15);
		$data['fg'] = $top10;

		return view('main2',$data);
	}

	public function inv()
	{
		return view('invoice-print');
	}
}
