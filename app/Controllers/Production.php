<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Production extends BaseController
{
	public function index($id)
	{
		if ($id == 'nl') {
			$div = 'Nylon';
		} elseif ($id == 'ch') {
			$div = 'Chassis';
		} elseif ($id == 'bz') {
			$div = 'Brazing';
		}else{
			$div = 'Passthrough';
		}
		$data['div'] = $div;
		return view('production/dashboard', $data);
	}
}
