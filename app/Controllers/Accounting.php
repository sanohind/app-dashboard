<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Accounting extends BaseController
{
	public function index()
	{
		//
	}

	public function stock_opname()
	{
		$getData = file_get_contents("http://10.1.10.101/api-display/public/get-wh-sto/");
        $whData = json_decode($getData);
        $data['warehouse'] = $whData->data;
		return view ('transaction/sto', $data);
	}
}
