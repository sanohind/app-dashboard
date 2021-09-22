<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Inventory extends BaseController
{
	public function index()
	{
		return view('inventory/main');
	}
}
