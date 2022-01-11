<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Inventory extends BaseController
{
	public function index($group = null)
	{
		if ($group == null) {
			$data['gp'] = 'FG';
		} else {
			$data['gp'] = $group;
		}
		return view('inventory/main', $data);
	}

	public function stockbywh($wh)
	{
		$data['wh'] = $wh;
		return view('inventory/invwh', $data);
	}
}
